<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Concert;

use App\User;

use App\Ticket;

class DashboardController extends Controller
{
    public function show ()
    {
      return view('dashboard');
    }

    public function showShowDashboard ()
    {
      return view ('showDashboard', ['shows' => Concert::get()]);
    }

    public function showUserDashboard ()
    {
      return view ('userDashboard', ['users' => User::get()]);
    }

    public function showTicketDashboard ()
    {
      return view ('ticketDashboard', ['tickets' => Ticket::get()]);
    }
}
