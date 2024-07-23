<?php

namespace classes;

use GuzzleHttp\Client;

class HttpHelper
{
    public $client;
    public function __construct()
    {
        $this->client = new Client();
        $this->client->request(
            'GET', [
                'base_uri' => 'https://api.crypto-scanner.io/v1/',
            ]
        );
    }
}