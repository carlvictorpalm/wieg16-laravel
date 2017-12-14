<?php

namespace App\Console\Commands;

use App\InstagramImage;
use Illuminate\Console\Command;

class ImportInstagramImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:images';

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
    public function handle()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.instagram.com/v1/users/self/media/recent?access_token=54180760.e731354.c94b22d3b05e457f9d6e83b104912003",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 3689792a-c8f0-2262-65c8-fcbf0ec1949a"
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);
        $err = curl_error($curl);
        curl_close($curl);
        //dd($response);
        foreach ($response['data'] as $image) {
            $this->info("Inserting/updating image with id: " . $image['id']);
            $dbImage = InstagramImage::findOrNew($image['id']);
            $url = $image['images']['standard_resolution']['url'];
            //$caption = $image['caption']['text'];
            $dbImage->fill(['id' => $image['id'], 'url' => $url])->save();

        }
    }
}
