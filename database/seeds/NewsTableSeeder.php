<?php

  use App\Models\News;
  use Illuminate\Database\Seeder;

  class NewsTableSeeder extends Seeder
  {
    public function run()
    {
      News::truncate();

      factory(News::class, 50)->create();
    }
  }