<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConcertTime extends Model
{
    protected $table = "ConcertTime";
    public $timestamps = false;

    public function Concert ()
    {
      return $this->belongsTo(Concert::class,"ConcertID");
    }

    public function tickets ()
    {
      return $this->hasMany(Ticket::class,"ConcertTimeID");
    }
}
