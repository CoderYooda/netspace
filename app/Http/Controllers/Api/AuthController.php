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
            $fields = $this->GetUserPublicFields($request['login']);
            $fields['suid'] = $this->GetOrCreateUserSession($request['login']);
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

    private function GetUserPublicFields($login)
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

        return $public_data;
    }
}
