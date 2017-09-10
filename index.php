<?php
//Fetch Tweets with hastag #DDTRESCUEME

require 'vendor/autoload.php';

class FetchFeed
{

    const CONFIG = [
        'oauth_access_token'        => "750972114405056516-mUddEBse7erJw9rvynv6Q2999BZG8GF",
        'oauth_access_token_secret' => "6IoqM4HzequibNh7S7BkEeDfuQXStCWV9iYq2XfrFn8Z7",
        'consumer_key'              => "ZRwyy4eLeyL31DzJcPFnsZVKE",
        'consumer_secret'           => "CL3jfiPp3nWaDJKLYI0l3vI9vAlpnRroymSGs4pzJRcHm6Bj6K"
    ];

    private $method = 'GET';

    private $url = 'https://api.twitter.com/1.1/search/tweets.json';

    protected $twitterApiExchange;

    public function __construct()
    {
        $this->twitterApiExchange = new TwitterAPIExchange(self::CONFIG);
    }

    public function searchHashTags()
    {

        $response = $this->twitterApiExchange->setGetfield('?q=%40DDTRESCUEME')
            ->buildOauth($this->url, $this->method)
            ->performRequest();

        header("Content-Type: application/json;charset=utf-8");
        print_r($response);
        exit;
    }
}

(new FetchFeed())->searchHashTags();