<?php

$router = app('admin.router');

$router->get('/', 'HomeController@index');

$router->get('/article', 'ArticleController@index');
$router->resource('article', ArticleController::class);