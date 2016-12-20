<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Concert;

use App\ConcertTime;

use App\TicketType;

use App\Ticket;

class TicketController extends Controller
{
    public function newTicket ()
    {
      return view('ticket.new',['shows' => Concert::get()]);
    }

    public function doNewTicket (Request $request)
    {
      $show = Concert::find($request->concert);
      $showtimes = $show->ConcertTime();

      return view('ticket.newSecondStep',['show' => $show, 'ticketTypes' => TicketType::orderBy('price','DESC')->get()]);
    }

    public function doNewTicketFinalise (Request $request)
    {
      try {
        $ticket = new Ticket();
        $ticket->ownername = $request->name;
        $ticket->ownerTel = $request->telephone;
        $ticket->ownerEmail = $request->email;
        $ticket->ConcertTimeID = $request->showtime;
        $ticket->TypeID = $request->type;

        $ticket->save();

        return redirect('/dashboard/ticket');
      } catch (Exception $e) {
        return back()->withError('addNewTicket', 'Something went wrong! Please Try again.');
      }

    }
}
