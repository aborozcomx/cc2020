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
$router->get('/', 'IndexController@index');
$router->get('registro/', 'UsersController@getAddUser');
$router->post('registro/', 'UsersController@postSaveUser');

$router->get('login/', 'AuthController@getLogin');
$router->get('logout/', 'AuthController@getLogout');
$router->post('auth/', 'AuthController@postLogin');

$router->get('ccadmin/', 'AdminController@getIndex');
$router->get('ccadmin/equipos/', 'TeamsController@getIndex');
$router->get('ccadmin/equipos/{id}', 'TeamsController@getTeam');
$router->post('ccadmin/equipos/', 'TeamsController@postSaveTeam');
$router->post('ccadmin/pagos/', 'PagosController@addPago');