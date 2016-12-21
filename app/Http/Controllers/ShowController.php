<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use App\Concert;

class ShowController extends Controller
{
    public function newShow ()
    {
      return view ('show.new');
    }

    public function doNewShow (Request $request)
    {
      $show = New Concert ();

      try
      {
      $show->name = $request->name;
      $show->description = $request->description;
      // $thumbnailFileName = str_replace("/","",bcrypt($request->name . $request->description));

      $show->save();

      // $request->thumbnail->storeAs('', $thumbnailFileName , 'thumbnail');

      return redirect('/dashboard/show')->with(['success' => "$show has been added"]);

      }
      catch(Exception $e)
      {
        return redirect('/dashboard/show')->withError(['addShow' => "Something went wrong please try again."]);
      }

    }

    public function doDeleteShow (Request $request)
    {
      $deleteTarget = Concert::find($request->id);

      $commulative = 0;

      foreach ($deleteTarget->concertTime() as $concertTime)
      {
        $commulative++;
      }

      if ($commulative == 0)
      {
        $deleteTarget->delete();
        return redirect('/dashboard/show')->with(['succsess' => 'The show has been deleted successfully']);
      }
      else return redirect('/dashboard/show')->withError(['deleteShow' => 'The show cannot be deleted due to issued tickets']);
    }

    public function editShow ($id)
    {
      $show = Concert::find($id);

      if ($show == null) return redirect('/dashboard/show');

      $noShowTime = count($show->ConcertTime()->get());
      $noTicket = 0;

      foreach ($show->ConcertTime()->get() as $time)
      {
        $noTicket += count($time->tickets()->get());
      }

      return view('show.info', ['show' => $show, 'noShowTime' => $noShowTime, 'noTicket' => $noTicket]);
    }
}
