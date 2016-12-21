<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Concert;

use App\ConcertTime;

use App\TicketType;

class ShowtimeController extends Controller
{
    public function newShowtime($id)
    {
      return view('showtime.new', ['show' => Concert::find($id)]);
    }

    public function doNewShowtime (Request $request)
    {
      try {
        $this->validate($request,[
          'showid' => 'required|exists:Concert,id',
          'datetime' => 'required',
        ]);

        $showtime = New ConcertTime();
        $showtime->showDate = $request->datetime;
        $showtime->ConcertID = $request->showid;
        $showtime->save();

      } catch (Exception $e) {
        echo $e->getMessage();
      }

      finally
      {
        return redirect("/show/$request->showid/edit");
      }
    }

    public function availableTicket ($id)
    {
      $showtime = ConcertTime::find($id);
      $ticketTypes = TicketType::get();

      $availableTicket = array();

      foreach ($ticketTypes as $ticketType)
      {
        $availableTicket[] = $ticketType->seat - count(DB::table('Ticket')->where('TypeID',$ticketType->id)->where('ConcertTimeID',$showtime->id)->get());
      }

      return view('showtime.showavailable',['showtime' => $showtime, 'seatTypes' => $ticketTypes, 'availableTicket' => $availableTicket]);
    }
}
