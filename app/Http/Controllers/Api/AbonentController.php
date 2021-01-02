<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Master;
use Illuminate\Http\Request;
use App\Http\Services\CarbonApi;
use Illuminate\Support\Facades\Mail;

class AbonentController extends Controller
{
    private static $username = "T3123323783-api";
    private static $password = "T3123323783";

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

    public function masterCall(Request $request)
    {
//        'net_space@mail.ru'
        $mess = new \stdClass();
        $mess->mess = $request['message'];

        $bool = Mail::to("net_space@mail.ru")->send(new Master($mess));
        return $bool;
    }

    public function pay(Request $request){

        $amount = (float)$request['amount'];
        $abonent_id = (int)$request['abonent_id'];
        $returnUrl = $request['returnUrl'];
        $failUrl = $request['failUrl'];

        $order_id = $abonent_id . '_' . rand(0,9999999);

        $url = "https://3dsec.sberbank.ru/payment/rest/register.do?amount=".intval($amount)."00&currency=643&language=ru&orderNumber=".$order_id.
            "&password=".self::$password.
            "&userName=".self::$username.
            "&returnUrl=".$returnUrl.
            "&failUrl=".$failUrl.
            "&pageView=DESKTOP&sessionTimeoutSecs=3600";


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        if( $response ){
            $response = json_decode($response, true);

            return $response;
        }
        return false;
    }

    public function getOrderStatus( Request $request )
    {
        if (file_exists(public_path() . '/checks/' . $request['order_id'] . '.lock')) {
            return response()->json(['ErrorCode' => 90, 'ErrorMessage' => 'По этому чеку баланс уже был начислен!']);
        } else {
            touch(public_path() . '/checks/' . $request['order_id'] . '.lock');
            $orderId = $request['order_id'];
            $url = "https://3dsec.sberbank.ru/payment/rest/getOrderStatus.do?orderId=".$orderId."&language=ru&password=".self::$password."&userName=".self::$username;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);

            if( $response ){
                $response = json_decode($response, true);
                if($response['ErrorCode'] > 0){
                    return response()->json($response);
                }


                $abonent_id = (int)explode('_', $response['OrderNumber'])[0];
                $summ = $response['depositAmount'] / 100;

                $balance = self::addBalance($abonent_id, $summ);

                $response['balance'] = round((float)$balance, 2);

                return $response;
            }
        }



        return false;
    }



    private static function addBalance($abonent_id, $summ)
    {
        $api = new CarbonApi('Abonents', 'post');
        $api->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode([
                    'id' => $abonent_id,
                ]),
                'method2' => 'add_payment',
                'arg2' => json_encode([
                    'SUM_IN' => $summ,
                ]),
            ]
        ];
        $response = $api->send();

        return isset($response->result->fields->balance) ? $response->result->fields->balance : false;
//        curl -XPOST -d 'method1=objects.get&arg1={"id": '$line'}&method2=add_payment&arg2={"SUM_IN": "600"}' 'http://169.254.80.82:8082/rest_api/v2/Abonents/' -D -;
    }
}
