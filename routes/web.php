<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/user/register', ['as' => 'api.register', 'uses' => 'RegisterController@register']);
    $router->post('/user/login', ['as' => 'api.login', 'uses' => 'LoginController@login']);
    $router->get('/user/{id}', ['as' => 'api.user', 'uses' => 'UserController@show']);
});
