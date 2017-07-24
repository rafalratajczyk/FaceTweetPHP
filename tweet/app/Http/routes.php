<?php

Route::get('/', [
    'uses' => '\Tweet\Http\Controllers\HomeController@index',
    'as' => 'welcome'
]);

Route::get('/alert', function () {
    return redirect()->route('welcome')->with('info', 'Signed up!');
});