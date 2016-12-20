<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Concert;

use App\ConcertTime;

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
}
