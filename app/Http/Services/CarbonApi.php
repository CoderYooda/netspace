<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class CarbonApi
{
    public $arguments;

    public $method;

    public $model;

    public $endpoint = "http://192.168.200.92:8082/rest_api/v2/";

    private $response;

    private $client;

    public function __construct($model, $method)
    {
        $this->client = new Client();
        $this->model = $model;
        $this->method = $method;
    }

    private function getEndpoint()
    {
        return $this->endpoint . $this->model . '/';
    }

    public function send(){
        $method = $this->method;
        $response = $this->client->$method($this->getEndpoint(), $this->arguments);
        $this->response = json_decode($response->getBody());
        return $this->response;
    }
}
