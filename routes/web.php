<?php

use Illuminate\Support\Facades\Route;

$host_address = parse_url(config('app.url'), PHP_URL_HOST);

Route::domain('web.' . $host_address)->group(function () {
  Route::get('/', 'AdminController@index')->name('index');

  Route::post('login', 'AdminController@login')->name('login');

  Route::post('/create-news', 'AdminController@createNews')->name('create.news');

  Route::put('/update-news/{news}', 'AdminController@updateNews')->name('update.news');

  Route::delete('/delete-news/{news}', 'AdminController@deleteNews')->name('delete.news');

  Route::any('/logout', 'AdminController@logout')->name('logout');
});

//Route::domain('news.' . $host_address)->group(function() {
//  Route::view('/', 'blog', ['posts' => \App\Models\News::orderBy('id', 'desc')->paginate(5)]);
//});
