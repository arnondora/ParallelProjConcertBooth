<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $table = "Concert";
    public $timestamps = true;

    public function concertTime ()
    {
      return $this->hasMany(ConcertTime::class,'ConcertID');
    }
}
