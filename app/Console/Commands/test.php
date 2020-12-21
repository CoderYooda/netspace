<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Http;

class test extends Command
{
    protected $signature = 'api:test';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
//        $endpoint = "http://192.168.200.92:8082/system_api/";
//        $client = new Client();
//
//        $response = $client->request('GET', $endpoint, ['query' => [
//            'format' => "json",
//            'context' => "web",
//            'model' => "users",
//            'method1' => "web_cabinet.login",
//            'arg1' => '{"login":"BILL0000664","passwd":"zm468x"}',
//        ]]);
//        $statusCode = $response->getStatusCode();
//        $content = $response->getBody();
        //curl -XPOST -d 'method1=objects.filter&arg1={"abonent__pk":"1"}' 'http://192.168.200.92:8082/rest_api/v2/Users/' -D -

        $endpoint = "http://192.168.200.92:8082/rest_api/v2/Users/";
//        $client = new Client();
//
//        $response = $client->request('POST', $endpoint, ['query' => [
//            'method1' => "objects.filter",
//            'arg1' => '{"abonent__pk":"1"}',
//        ]]);
//        $statusCode = $response->getStatusCode();
//        $content = $response->getBody();


//        $response = $client->post($endpoint, [
//            RequestOptions::JSON => ['method1' => 'objects.filter', 'arg1' => '{"abonent__pk":"1"}'],
//        ]);


//        $response = Http::post('http://192.168.200.92:8082/rest_api/v2/Users/', [
//            'method1' => 'objects.filter',
//            'arg1' => '{"abonent__pk":"1"}',
//        ]);
        //format=json&context=web&model=users&method1=web_cabinet.try_auto_login
        //curl -XPOST -d 'method1=objects.get&arg1={"login":"BILL0000664"}' http://192.168.200.92:8082/rest_api/v2/Users/ -D -

        $client = new Client();
        $res = $client->post($endpoint, ['method1' => 'objects.get&arg1', 'arg1' => '{"login":"BILL0000664"}']);
        echo $res->getStatusCode(); // 200
        echo $res->getBody();


        dd($res);
    }
}
