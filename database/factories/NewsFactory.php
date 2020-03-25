<?php

  /** @var \Illuminate\Database\Eloquent\Factory $factory */

  use App\Models\News;
  use Faker\Generator as Faker;
  use Illuminate\Support\Str;

  /*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | This directory should contain each of the model factory definitions for
  | your application. Factories provide a convenient way to generate new
  | model instances for testing / seeding your application's database.
  |
  */

  $factory->define(News::class, function (Faker $faker) {
    $index = array_rand(range(1, 30));

    if ($index === 0) {
      $index = 1;
    }

    return [
      'hash' => News::makeHash(),
      'title' => $faker->name,
      'body' => $faker->text(),
      'date' => now(),
      'ads' => $faker->text(),
      'image' => 'images/' . $index . '.jpeg',
    ];
  });
