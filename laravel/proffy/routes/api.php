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

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->get('/laravel-version', function () use ($router) {
        return $router->app->version();
    });

    /**
     * Users
     */
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
    });

    /**
     * Classes
     */
    $router->group(['prefix' => 'classes'], function () use ($router) {
        $router->get('/', 'ClassController@index');
        // $router->post('/', 'UserController@store');
    });

    /**
     * Connections
     */
    $router->group(['prefix' => 'connections'], function () use ($router) {
        $router->get('/', 'ConnectionController@index');
        $router->post('/', 'ConnectionController@create');
    });

});
