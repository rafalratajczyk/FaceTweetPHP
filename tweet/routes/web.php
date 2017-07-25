<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => '\Tweet\Http\Controllers\HomeController@index',
    'as' => 'welcome'
]);

Route::get('/alert', function () {
    return redirect()->route('welcome')->with('info', 'Signed up!');
});

Route::get('/signup', [
    'uses' => '\Tweet\Http\Controllers\AuthController@getSignUp',
    'as' => 'auth.signup'
]);

Route::post('/signup', [
    'uses' => '\Tweet\Http\Controllers\AuthController@postSignUp'
]);

Route::get('/signin', [
    'uses' => '\Tweet\Http\Controllers\AuthController@getSignIn',
    'as' => 'auth.signin'
]);

Route::post('/signin', [
    'uses' => '\Tweet\Http\Controllers\AuthController@postSignIn'
]);


