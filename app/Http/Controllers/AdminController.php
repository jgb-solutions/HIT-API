<?php

  namespace App\Http\Controllers;

  use OneSignal;
  use App\Models\News;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Http;

  class AdminController extends Controller
  {
    public function index()
    {
      if (auth()->guest()) {
        return view('login');
      } else {
        return view('admin', [
          'news' => News::latest()->paginate(10),
        ]);
      }
    }

    public function createNews(Request $request)
    {
      $data = [
        'hash' => News::makeHash(),
      ];

      if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'wasabi');

        $data['image'] = $path;
      }

      $request_data = $request->only('date', 'title', 'body', 'ads');

      if ($request->video_url) {
        parse_str(parse_url($request->video_url, PHP_URL_QUERY), $youtube_string_var);

        $data['video_id'] = $youtube_string_var['v'];
      }

      $news = News::create(array_merge($data, $request_data));

      // handle notification
      if ($request->shouldNotify) {
        $this->push_send($news);
      }

      // Rebuild Zeit deployment when news added
      $this->zei_deploy_hook();

      return redirect('/');
    }

    public function updateNews(Request $request, News $news)
    {
      $data = [];

      if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'wasabi');

        $data['image'] = $path;
      }

      $request_data = $request->only('date', 'title', 'body', 'ads');

      if ($request->video_url) {
        parse_str(parse_url($request->video_url, PHP_URL_QUERY), $youtube_string_var);

        $data['video_id'] = $youtube_string_var['v'];
      }

      $news->update(array_merge($data, $request_data));

      return redirect('/');
    }

    public function login(Request $request)
    {
      auth()->attempt($request->only('email', 'password'));

      return redirect('/');
    }

    public function logout()
    {
      auth()->logout();

      return redirect('/');
    }

    public function deleteNews(News $news)
    {
      $news->delete();

      // Rebuild Zeit deployment when news deleted
      $this->zei_deploy_hook();

      return back();
    }

    public function push_send($news)
    {
      OneSignal::setParam('headings', ['en' => $news->title])
        ->sendNotificationToAll(
          strip_tags(explode("\n", $news->body)[0]),
          $url = 'https://infotoutan.com/n/' . $news->hash,
          $data = null,
          $buttons = null,
          $schedule = null
        );

      return redirect('/');
    }

    public function zei_deploy_hook()
    {
      Http::post(config('services.zeit.deploy_hook'));
    }
  }
