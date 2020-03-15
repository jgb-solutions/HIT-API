<?php

  namespace App\Models;

  use Illuminate\Support\Str;
  use Illuminate\Database\Eloquent\Model;

  class News extends Model
  {
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public static function makeHash()
    {
      do {
        $hash = Str::random(3);
      } while (News::whereHash($hash)->first());

      return $hash;
    }
  }
