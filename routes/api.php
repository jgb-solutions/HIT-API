<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\News;

Route::get('news', function() {
  return News::all();
});