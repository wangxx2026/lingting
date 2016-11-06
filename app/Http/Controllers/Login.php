<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Login extends Controller
{
    //登陆接口
    public function index(Request $request)
    {
        if($request->input('username'))
        {
            echo 'aaaa';
            return response('')->cookie('lingting_authen', $request->input('username'), 30*24*60*60);
        }
    }

    public function test(Request $request)
    {
        echo $request->cookie('lingting_authen');
    }

}
