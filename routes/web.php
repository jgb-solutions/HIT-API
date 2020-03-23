<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@index');

Route::post('login', 'AdminController@login');

Route::post('/create-news', 'AdminController@createNews');

Route::any('/logout', 'AdminController@logout');