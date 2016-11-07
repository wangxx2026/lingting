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


            return response(array( 'code' => 200, 'msg' => '', 'rst' => $request->input('username')))->cookie('lingting_authen', $request->input('username'), 10);

        }
    }

    public function test(Request $request)
    {
        $content = $request->cookie('lingting_authen');
        return response(array('code' => 200, 'msg' => '', 'rst' => $content));
    }

}
