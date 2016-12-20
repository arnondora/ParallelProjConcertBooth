<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $table = "TicketType";
    public $timestamps = false;

    public function tickets ()
    {
      return $this->hasMany(Ticket::class,'TicketID');
    }
}
