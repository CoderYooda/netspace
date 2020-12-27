<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CarbonApi;

class AbonentController extends Controller
{
    public function getArches(Request $request){
        $api = new CarbonApi('ArchAccountStack', 'post');
        $api->arguments = [
            'form_params' => [
                'method1' => 'objects.filter',
                'arg1' => json_encode([
                    'abonent_id' => $request['abonent_id'],
                    'change_balance_time__range' => [$request['start'], $request['end']],
                    'storno' => 0,
                ])
            ]
        ];
        $response = $api->send();

        return response()->json($response->result);
    }
    public function addBalance(Request $request)
    {
        $api = new CarbonApi('Abonents', 'post');
        $api->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode([
                    'id' => $request['abonent_id'],
                ]),
                'method2' => 'add_payment',
                'arg2' => json_encode([
                    'SUM_IN' => "100",
                ]),
            ]
        ];
        $response = $api->send();
        return response()->json($response);
//        curl -XPOST -d 'method1=objects.get&arg1={"id": '$line'}&method2=add_payment&arg2={"SUM_IN": "600"}' 'http://169.254.80.82:8082/rest_api/v2/Abonents/' -D -;
    }
}
