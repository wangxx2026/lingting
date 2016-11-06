<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 登陆接口
Route::get('/login/', 'Login@index');


// 登陆接口
Route::get('/login/test/', 'Login@test');

// 注册接口

Route::get('/register/', function () {
    return array('username' =>$_GET['username'], 'passwod' => $_GET['password']);
});

// 咨询师列表
