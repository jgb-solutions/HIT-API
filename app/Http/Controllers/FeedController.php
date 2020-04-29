<?php

  namespace App\Http\Controllers;

  use Carbon\Carbon;
  use App\Models\News;
  use Suin\RSSWriter\Item;
  use Suin\RSSWriter\Feed;
  use Suin\RSSWriter\Channel;
  use Illuminate\Http\Request;

  class FeedController extends Controller
  {
    public $description = <<<EOD
      Haïti Info Toutan (HIT) est une plateforme Fondée par de jeunes Haïtiens en 2016,
      dont l'objectif est d'informer ses abonnés en tout le temps,
      dont son nom Haiti info Toutan, constituée de professionnels de l'information.
      HIT se veut être un outil util pour ses lecteurs pour qui,
      l'information est d'une importance capitale dans leur quotidien.
    EOD;

    public function __invoke(Request $request)
    {
      // $key = $type . '_rss_feed_';

      $allNews = News::orderBy('id', 'desc')->take(100)->get();

      $rss = $this->buildRssData($allNews);

      $rss = response($rss)->header('Content-type', 'application/rss+xml');

      return $rss;
    }

    /**
     * Return a string with the feed data
     *
     * @return string
     */
    protected function buildRssData($allNews)
    {
      $now     = Carbon::now();
      $feed    = new Feed();
      $channel = new Channel();

      $channel->title(config('app.name'))
        ->description($this->description)
        ->url('https://infotoutan.com')
        ->language('fr')
        ->copyright(date('Y') . ' ' . config('app.name') . ', Tous Droits Réservés.')
        ->lastBuildDate($now->timestamp)
        ->appendTo($feed);

      foreach ($allNews as $news) {
        $item = new Item();

        $title       = "#HITNews {$news->title} - " . config('app.name');
        $url         = "https://infotoutan.com/n/{$news->hash}";
        $description = "{$news->title} - " . config('app.name');

        $item->title($title)
          ->description($description)
          ->url($url)
          ->pubDate($news->created_at->timestamp)
          ->guid($url, true)
          ->appendTo($channel);
      }

      $feed = (string)$feed;

      // Replace a couple items to make the feed more compliant
      $feed = str_replace(
        '<rss version="2.0">',
        '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">',
        $feed
      );

      $feed = str_replace(
        '<channel>',
        '<channel>
			<atom:link href="' . secure_url("/feed") . '" rel="self" type="application/rss+xml" />',
        $feed
      );

      return $feed;
    }
  }