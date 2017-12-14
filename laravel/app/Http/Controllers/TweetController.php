<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function showTweets()
    {
        $tweets = Tweet::all();
        return View('twitter/tweets', ['twitter_tweets' => $tweets]);
    }

    public function callTweetCount()
    {
        $tweets = Tweet::all('text');
        $result = Tweet::count_words($tweets);
        return response()->json($result);
    }

    public function exclude()
    {
        $tweets = Tweet::all();
        $result = Tweet::excludeWords($tweets);
        return response()->json($result);
    }


    public function tweetForm()
    {
        $searchWord = "";
        $tweet = [];
        if (isset($_GET["search"]))
        {
            $searchWord = $_GET['search'];
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.twitter.com/1.1/search/tweets.json?q='.$searchWord.'",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer AAAAAAAAAAAAAAAAAAAAAL6r3QAAAAAA3KYlimop2KK4aOqq2diiULWPoiM%3D7ap6Ino1OlPRvwNwqzvY6Y0ZRbtdxQtVLNORxWXG0geZx9ahPD",
                    "cache-control: no-cache",
                    "postman-token: 946b77fd-a6f4-9234-e0d9-135db04d66da"
                ),
            ));
            $response = json_decode(curl_exec($curl), true);
            curl_close($curl);
            $tweet = Tweet::find_tweet($response);
        }
        return View('twitter/tweetForm', ['twitter_tweets' => $tweet]);

    }

    public function destroy($id)
    {
        //
    }
}
