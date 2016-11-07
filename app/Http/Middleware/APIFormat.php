<?php

namespace App\Http\Middleware;

use Closure;

class APIFormat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        /*$original = $response->original;
        if(!isset($original['code']) || !isset($original['msg']) || !isset($original['rst']))
        {
            echo json_encode(array('code' => '408', 'msg' => '返回数据不符合规范', 'rst' =>''));
            die();
        }
        $response->original = json_encode($response->original);*/
        return $response;
    }
}
