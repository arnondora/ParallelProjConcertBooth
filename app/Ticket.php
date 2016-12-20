<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "Ticket";
    public $timestamps = true;

    public function Showtime ()
    {
        return $this->belongsTo(ConcertTime::class, "ConcertTimeID");
    }

    public function TicketType ()
    {
      return $this->belongsTo(TicketType::class, "TypeID");
    }
}
