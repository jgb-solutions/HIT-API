<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@index')->name('index');

Route::post('login', 'AdminController@login')->name('login');

Route::post('/create-news', 'AdminController@createNews')->name('create.news');

Route::put('/update-news/{news}', 'AdminController@updateNews')->name('update.news');

Route::delete('/delete-news/{news}', 'AdminController@deleteNews')->name('delete.news');

Route::any('/logout', 'AdminController@logout')->name('logout');