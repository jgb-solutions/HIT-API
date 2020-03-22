<?php

  namespace App\Http\Controllers\API;

  use App\Models\News;
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;

  class NewsController extends Controller
  {
    public function index(Request $request)
    {
      $take = is_numeric($request->get('take')) ? $request->get('take'): 12;

      return News::paginate($take);
    }

    public function show($newsHash)
    {
      $news = News::whereHash($newsHash)->firstOrFail()->toArray();

      $news['randoms'] = News::inRandomOrder()->take(6)->get();

      return $news;
    }
  }