<?php

namespace App\Console\Commands;

use App\Address;
use App\Customer;
use Illuminate\Console\Command;

class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        $url = 'https://www.milletech.se/invoicing/export/customers';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

       $this->info("Sending request to:".$url);
        $response = json_decode(curl_exec($curl), true);
        foreach ($response as $customer) {
            $this->info("Inserting/updating customer: ".$customer['id']);
            $dbCustomer = Customer::findOrNew($customer['id']);
            $dbCustomer->fill($customer)->save();
            if (isset($customer['address']) && is_array($customer['address'])) {
                $address = Address::findOrNew($customer['address']['id']);
                $address->fill($customer['address'])->save();
            }
        }
    }
}
