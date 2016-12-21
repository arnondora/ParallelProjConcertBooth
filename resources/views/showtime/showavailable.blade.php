@extends('components.template')

@section('title', 'Available Ticket')

@section('content')
  <div class = "row"><h1>Available Ticket</h1></div>

  @include('components.signs')

  <div class = "row" style = "margin-top:15px;">
      <div class = "col-md-6">
        <div class = "row"><strong>Show Name : </strong> <span>{{$showtime->Concert()->first()->name}}</span></div>
        <div class = "row">
          <strong>Show Desciption :</strong>
          <p>{{$showtime->Concert()->first()->description}}</p>
        </div>
      </div>

      <div class = "col-md-6">
        <div class = "row"><strong>Showtime : {{$showtime->showDate}}</strong></div>
        <div class = "row"><strong>No. of showtime : {{count($showtime->Concert()->first()->ConcertTime()->get())}}</strong></div>
        <div class = "row"><strong>No. of issued ticket(s) : {{count($showtime->tickets()->get())}}</strong></div>
      </div>

    </div>
    <hr>

  <div class = "row"><h1>Available Seat By Ticket Type</h1></div>

  <div class = "row" style = "margin-top:15px;">
    @if(count($seatTypes) == 0)
      <h2>There's no ticket type for this show</h2>
    @else
      <table class = "table">
        <tr>
          <td>Ticket Type</td>
          <td>No of Remaining Ticket(s)</td>
        </tr>

        @foreach ($seatTypes as $seatType)
          <tr>
            <td>{{$seatType->name}}</td>
            <td>{{$availableTicket[$loop->index]}}</td>
          </tr>
        @endforeach
      </table>
    @endif
  </div>
@endsection
