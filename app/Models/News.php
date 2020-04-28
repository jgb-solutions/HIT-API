<?php

  namespace App\Models;

  use Carbon\Carbon;
  use Illuminate\Support\Str;
  use Illuminate\Database\Eloquent\Model;
  use GeneaLabs\LaravelModelCaching\Traits\Cachable;

  class News extends Model
  {
    use Cachable;

    protected $hidden = ['id', 'created_at', 'updated_at', 'image', 'date'];
    protected $dates = ['date'];
    protected $guarded = [];
    protected $appends = ['image_url', 'public_date'];

    public static function makeHash()
    {
      do {
        $hash = Str::random(3);
      } while (News::whereHash($hash)->first());

      return $hash;
    }

    public function getPublicDateAttribute()
    {
      setlocale(LC_TIME, 'fr_FR', 'fr', 'FR', 'French', 'fr_FR.UTF-8');
//      Carbon::setLocale('fr'); // This is only needed to use ->diffForHumans()
//      return Carbon::parse($date)->formatLocalized('%I:%M %p %r / %d %B %Y');
      return Carbon::parse($this->date)->format('h:i A / d M Y');
//      return strftime("%A %e %B %Y", Carbon::parse($date)-();
    }

    public function getImageUrlAttribute()
    {

      return $this->image ? 'https://files.infotoutan.com/' . $this->image : null;
    }
  }
