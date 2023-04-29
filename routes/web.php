<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


//more simple routes
$router->get('/users', 'studentController@index');
$router->get('/users/{id}', 'studentController@show'); 
$router->patch('/users/{id}', 'studentController@update'); 
$router->delete('/users/{id}', 'studentController@delete'); 