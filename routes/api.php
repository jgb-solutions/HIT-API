<?php

use Illuminate\Support\Facades\Route;

Route::get('/news', 'NewsController@index');
Route::get('/news/{newsHash}', 'NewsController@show');