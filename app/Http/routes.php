<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('pages/{id}', 'PagesController@show');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
Route::get('auth/login','Auth\AuthController\getLogin');
Route::post('auth/login','Auth\AuthController\postLogin');
Route::get('auth/logout','Auth\AuthController\getLogout');

//创建一个路由组
// Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'auth'],function(){
// 	Route::get('/','AdminHomeController@index');
// 	Route::resource('pages', 'PagesController');
// });
  Route::group(['middleware' => 'auth', 'namespace' => 'admin', 'prefix' => 'admin'], function() {
  	Route::get('/', 'HomeController@index');
  	Route::resource("article", "ArticleController");
  });
