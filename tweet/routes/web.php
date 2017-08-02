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
    'as' => 'auth.signup',
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

Route::get('/signout', [
    'uses' => '\Tweet\Http\Controllers\AuthController@getSignOut',
    'as' => 'auth.signout'
]);

Route::get('/search', [
    'uses' => '\Tweet\Http\Controllers\SearchController@getResults',
    'as' => 'search.results'
]);

Route::get('/user/{username}', [
    'uses' => '\Tweet\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index'
]);

Route::get('/profile/edit', [
    'uses' => '\Tweet\Http\Controllers\ProfileController@getEdit',
    'as' => 'profile.edit'
]);

Route::post('/profile/edit', [
    'uses' => '\Tweet\Http\Controllers\ProfileController@postEdit',
]);

Route::get('/friends', [
    'uses' => '\Tweet\Http\Controllers\FriendController@getIndex',
    'as' => 'friends.index'
]);

Route::get('/friends/add/{username}', [
    'uses' => '\Tweet\Http\Controllers\FriendController@getAdd',
    'as' => 'friends.add'
]);

Route::get('/friends/accept/{username}', [
    'uses' => '\Tweet\Http\Controllers\FriendController@getAccept',
    'as' => 'friends.accept'
]);

Route::post('/status', [
    'uses' => '\Tweet\Http\Controllers\StatusController@postStatus',
    'as' => 'status.post'
]);

Route::post('/status/{statusId}/reply', [
    'uses' => '\Tweet\Http\Controllers\StatusController@postReply',
    'as' => 'status.reply'
]);

