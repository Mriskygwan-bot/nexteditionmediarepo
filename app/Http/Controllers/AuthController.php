<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    public function login(Request $request)
    {
         $login = $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($login)) {
            return response(['message'=> 'Invalid login credentials']);
        }

        $obj_user = Auth::user();
        $str_token = $obj_user->createToken('Bearer')->accessToken;

        return response([
            'user' =>  new UserResource($obj_user),
            '_token' => $str_token
        ]);
    }

    public function test()
    {
        return response(['data' => 'test successful']);
    }

    public function authTest(Request $request)
    {
        if(empty(Auth::user()))
        {
            return response(['error-code' => '404', 'message' => 'unauthorized' ]);
        }

        if($request->get('email') !== Auth::user()->email)
        {
            return response(['error-code' => '404', 'message' => 'unauthorized' ]);
        }

        return response(['data' => new UserResource(Auth::user())]);
    }
}