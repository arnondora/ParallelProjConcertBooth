@extends('components.template')

@section('title', 'Ticket Management')

@section('content')
  <div class = "row"><h1>Ticket Management</h1></div>

  @include('components.signs')

  <div class = "row">
    <a href = "/ticket/type">Ticket Type Management</a>
    <a href = "/ticket/add"><i class="fa fa-plus" aria-hidden="true"></i> Reserve new Ticket</a>
  </div>

  <div class = "row" style = "margin-top:15px;">
    @if(count($tickets) > 0)
      <table class = "table">
        <tr>
          <td>Name</td>
          <td>Email</td>
          <td>Show</td>
          <td>Ticket Type</td>
        </tr>

        @foreach ($tickets as $ticket)
          <tr>
            <td>{{$ticket->ownerName}}</td>
            <td>{{$ticket->ownerEmail}}</td>
            <td>{{$ticket->Showtime()->first()->Concert()->first()->name}}</td>
            <td>{{$ticket->TicketType()->first()->name}}</td>
          </tr>
        @endforeach
      </table>
      @else
        <h2>There's no ticket</h2>
    @endif
  </div>
@endsection
