<?php

namespace App\Console\Commands;

use App\Tweet;
use Illuminate\Console\Command;

class ImportTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:tweets';

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
            CURLOPT_URL => "https://api.twitter.com/1.1/search/tweets.json?q=doggo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer AAAAAAAAAAAAAAAAAAAAAL6r3QAAAAAA3KYlimop2KK4aOqq2diiULWPoiM%3D7ap6Ino1OlPRvwNwqzvY6Y0ZRbtdxQtVLNORxWXG0geZx9ahPD",
                "cache-control: no-cache",
                "postman-token: 3a16e05d-1513-19a6-f13f-2d65bae38b9a"
            ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        $err = curl_error($curl);
        curl_close($curl);

        foreach ($response['statuses'] as $tweet) {
            $this->info("Inserting/updating tweet with id: " . $tweet['id']);
            $tweet['text'] = preg_replace('/[[:^print:]]/', '', $tweet['text']);

            $dbTweet = Tweet::findOrNew($tweet['id']);
            $dbTweet->fill(['id' => $tweet['id'], 'text' => $tweet['text']])->save();
        }
    }
}
