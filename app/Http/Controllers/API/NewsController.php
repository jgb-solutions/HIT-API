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

      return News::orderBy('created_at', 'desc')
        ->paginate($take, ['id', 'hash', 'image', 'title', 'date', 'created_at']);
    }

    public function show($newsHash)
    {
      $news = News::whereHash($newsHash)->firstOrFail()->toArray();

      $news['randoms'] = News::where('hash', '!=', $newsHash)->inRandomOrder()->take(6)->get();

      return $news;
    }
  }
