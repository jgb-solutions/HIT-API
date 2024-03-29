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

      return News::orderBy('id', 'desc')->paginate($take, ['hash', 'image', 'title', 'date']);
    }

    public function show($newsHash)
    {
      $news = News::whereHash($newsHash)->firstOrFail()->toArray();

      $news['randoms'] = News::where('hash', '!=', $newsHash)->inRandomOrder()->take(8)->get(['hash', 'image', 'title', 'date']);

      return $news;
    }
  }
