<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CarbonApi;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $api = new CarbonApi('Users', 'post');
        $api->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['login' => $request['login']]),
                'method2' => 'check_pass',
                'arg2' => json_encode(['passwd' => $request['password']])
            ]
        ];
        $response = $api->send();
        if(isset($response->result) && $response->result){
            // Авторизация успешна
            $fields['suid'] = $this->GetOrCreateUserSession($request['login']);
            $fields = $this->GetUserPublicFields($request['login'], $fields['suid']);
            $fields2 = $this->GetAbonentData($fields['abonent_id']);
            $fields = array_merge($fields, $fields2);
            return response()->json($fields);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Авторизация не удалась']);
        }

    }

    private function GetOrCreateUserSession($login)
    {
        $user_req = new CarbonApi('Users', 'post');
        $user_req->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['login' => $login]),
                'method2' => 'get_or_create_dynamic_session',
                'arg2' => '{}',
            ]
        ];
        $user_response = $user_req->send();

        return $user_response->result->fields->suid;
    }

    private function GetUserPublicFields($login, $suid)
    {
        $req = new CarbonApi('Users', 'post');
        $req->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['login' => $login])
            ]
        ];
        $resp = $req->send();

        $public_data['abonent_id'] = $resp->result->fields->abonent_id;
        $public_data['a_home_number'] = $resp->result->fields->a_home_number;
        $public_data['ip'] = $resp->result->fields->ip;
        $public_data['login'] = $resp->result->fields->login;
        $public_data['sms'] = $resp->result->fields->sms;
        $public_data['ostatok'] = $resp->result->fields->ostatok;
        $public_data['debit'] = $resp->result->fields->debit;
        $public_data['sms'] = $resp->result->fields->sms;
        $public_data['gen_pwd'] = $resp->result->fields->gen_pwd;

        $req = new CarbonApi('Users', 'post');
        $req->arguments = [
            'form_params' => [
                'method1' => 'web_cabinet.get_promise_pay_list',
                'arg1' => json_encode(['suid' => $suid])
            ]
        ];
        $resp = $req->send();
        
//        dd($resp->result);




        return $public_data;
    }
    private function GetAbonentData($abonent_id)
    {
        $req = new CarbonApi('Abonents', 'post');
        $req->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['id' => $abonent_id]),
                'fields' => json_encode(['name', 'promise_pay', 'promise_date_end', 'recomend_pay_sum', 'minimal_pay_sum', 'allow_internet', 'tarif']),

            ]
        ];
        $response = $req->send();
//
//        dd($response->error);
//        dd($response->result);

        $data['name'] = $response->result->fields->name;
        $data['promise_pay'] = $response->result->fields->promise_pay;
        $data['promise_date_end'] = $response->result->fields->promise_date_end;
        $data['recomend_pay_sum'] = $response->result->fields->recomend_pay_sum;
        $data['minimal_pay_sum'] = $response->result->fields->minimal_pay_sum;
        $data['allow_internet'] = $response->result->fields->allow_internet;
        $data['tarif_name'] = $response->result->fields->tarif->fields->name;

        $req = new CarbonApi('Abonents', 'post');
        $req->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['id' => $abonent_id]),
                'method2' => 'get_balance_until_date',
            ]
        ];
        $response = $req->send();
        $data['enough_to_date'] = $response->result->enough_to_date;
        $data['days_until'] = $response->result->days_until;


        $req = new CarbonApi('AdminAccounts', 'post');
        $req->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['account_id_abonents' => $abonent_id]),
                'fields' => json_encode(['balance'])
            ]
        ];
        $response = $req->send();
        $data['balance'] = $response->result->fields->balance;


        return $data;
    }

    public function changePass(Request $request)
    {
        if($request['pass'] !== $request['confirm']){
            return response()->json(['status' => 'error2', 'message' => 'Пароли не совпадают']);
        }
        $api = new CarbonApi('Users', 'post');
        $api->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['login' => $request['login']]),
                'method2' => 'check_pass',
                'arg2' => json_encode(['passwd' => $request['old']])
            ]
        ];
        $response = $api->send();
        if(isset($response->result) && $response->result){
            $req = new CarbonApi('Users', 'post');
            $req->arguments = [
                'form_params' => [
                    'method1' => 'objects.get',
                    'arg1' => json_encode(['login' => $request['login']]),
                    'method2' => 'set_password',
                    'arg2' => json_encode(['psw' => $request['pass'], 'dontshow' => false]),

                ]
            ];
            $response = $req->send();
            return response()->json(['status' => 'success', 'message' => 'Пароль Обновлен']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Неверный пароль']);
        }
    }
    public function changePhone(Request $request)
    {
        $api = new CarbonApi('Users', 'post');
        $api->arguments = [
            'form_params' => [
                'method1' => 'objects.get',
                'arg1' => json_encode(['login' => $request['login']]),
                'method2' => 'check_pass',
                'arg2' => json_encode(['passwd' => $request['pass']])
            ]
        ];
        $response = $api->send();
        if (isset($response->result) && $response->result) {
            $req = new CarbonApi('Users', 'post');
            $req->arguments = [
                'form_params' => [
                    'method1' => 'objects.get',
                    'arg1' => json_encode(['login' => $request['login']]),
                    'method2' => 'set',
                    'arg2' => json_encode(['sms' => $request['phone']]),
                    'method3' => 'save',
                    'arg3' => '{}',
                ]
            ];
            $response = $req->send();
            return response()->json(['status' => 'success', 'message' => 'Данные обновлены']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Неверный пароль']);
        }
//        curl -XPOST 'http://<ip>:8082/rest_api/v2/Abonents/' --data 'method1=objects.get&arg1={"id":"45"}&method2=set&arg2={"a_home_number":"3"}&method3=save&arg3={}';
    }
}
