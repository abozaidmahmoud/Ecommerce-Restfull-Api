<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use phpseclib\Crypt\Hash;

class authController extends Controller
{
    public function login(Request $req)
    {
        $http = new \GuzzleHttp\Client;

//        try{
//            $response=$http->post('http://localhost:8000/oauth/token',[
//                'form_params'=>[
//                    'grant_type'=>'password',
//                    'client_id'=>'2',
//                    'client_secret'=>'IxhBR10MCzKUv04lyOJXE3igQtg77AMtK3daRYqm',
//                    'username'=>'yousef@mail.com',
//                    'password'=>111111,
//                ]
//            ]);
//
//
//            return $response->getBody();
//
//
//        } catch (\GuzzleHttp\Exception\BadResponseException $e){
//
//            if($e->getCode()===400){
//                return response()->json('invalid formats , enter username or [pass',$e->getCode());
//            }else if($e->getCode()===401){
//                return response()->json('your creadinatiol not valid',$e->getCode());
//            }
//
//            return response()->json('errror in interal server',$e->getCode());
//        }

    }

    public function register(Request $req)
    {

        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        return User::create([

            'name' => $req->name,
            'email' => $req->email,
            'password' => ($req->name)

        ]);

    }

    public function logout()
    {

        $codes=auth()->user()->tokens;
        foreach ($codes as $c){
            $c->delete();
        }
        return response()->json('logouted out') ;

    }


}
