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
  return view('auth.register');
});
//$router->get('/login', function () use ($router) {
//  return view('auth.login');
//});
//$router->get('/create/recipe', function () use ($router) {
//  return view('create-recipe');
//});
//$router->get('/edit/recipe/{id}', function () use ($router) {
//    return view('edit-recipe');
//});

$router->post('/login', 'LoginController@index');
$router->post('/register', 'UserController@register');
$router->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);
$router->post('/store/recipe', ['middleware' => 'auth', 'uses' =>  'RecipeController@store']);
$router->get('/edit/recipe/{id}', ['middleware' => 'auth', 'uses' =>  'RecipeController@edit']);
$router->post('/update/recipe', ['middleware' => 'auth', 'uses' =>  'RecipeController@update']);
