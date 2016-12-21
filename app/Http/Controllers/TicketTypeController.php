<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TicketType;

class TicketTypeController extends Controller
{
    public function show ()
    {
      return view('ticketType.show',['ticketTypes' => TicketType::get()]);
    }

    public function newType ()
    {
      return view('ticketType.new');
    }

    public function doNewType (Request $request)
    {
      try
      {
        $this->validate($request,[
          'name' => 'required|unique:TicketType,name',
          'price' => 'required|numeric|min:0',
          'seat' => 'required|numeric|min:1'
        ]);

        $type = new TicketType();

        $type->name = $request->name;
        $type->price = $request->price;
        $type->seat = $request->seat;

        $type->save();
        return redirect('/ticket/type');
      }
      catch (Exception $e)
      {
        return back()->withError($e);
      }

    }
}
