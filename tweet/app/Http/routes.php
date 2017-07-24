<?php

Route::get('/', [
    'uses' => '\Tweet\Http\Controllers\HomeController@index',
    'as' => 'welcome'
]);