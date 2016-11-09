<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as user;

class Login extends Controller
{
    //登陆接口
    public function index(Request $request)
    {
        if($request->input('mobile'))
        {
            $data = user::where('mobile', $request->input('mobile'))->first();
            $rst = array(
                'id' => $data->id,
                'mobile' => $data->mobile,
                'username' => $data->username,
                'status' => $data->status,
                'ceate_time' => $data->ceate_time,
                'update_time' => $data->update_time
            );
            return response(array( 'code' => 200, 'msg' => '', 'rst' => $rst))->cookie('lingting_authen', $rst, 10);
        }
    }

    public function test(Request $request)
    {
        $content = $request->cookie('lingting_authen');
        return response(array('code' => 200, 'msg' => '', 'rst' => $content));
    }

}
