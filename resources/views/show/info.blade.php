@extends('components.template')

@section('title', 'Show Info')

@section('content')
  <div class = "row"><h1>Show Info</h1></div>

  @include('components.signs')

  <div class = "row" style = "margin-top:15px;">
      <div class = "col-md-6">
        <div class = "row"><strong>Show Name : </strong> <span>{{$show->name}}</span></div>
        <div class = "row">
          <strong>Show Desciption :</strong>
          <p>{{$show->description}}</p>
        </div>
      </div>

      <div class = "col-md-6">
        <div class = "row"><strong>No. of showtime : {{$noShowTime}}</strong></div>
        <div class = "row"><strong>No. of issued ticket(s) : {{$noTicket}}</strong></div>
      </div>

    </div>
    <hr>

  <div class = "row"><h1>Showtime</h1></div>
  <div class = "row">
    <a href="/show/{{$show->id}}/time/add"><span class = "fa fa-plus"></span> Add New Showtime</a>
  </div>
  <div class = "row" style = "margin-top:15px;">
    @if (count($show->ConcertTime()->get()) == 0)
      <h2>There's no showtime for this show</h2>
    @else
      <table class = "table">
        <tr>
          <td>Show Date Time</td>
          <td>No of Ticket(s)</td>
        </tr>

        @foreach ($show->ConcertTime()->get() as $showTime)
          <tr>
            <td><a href = "/show/{{$showTime->id}}/time">{{$showTime->showDate}}</a></td>
            <td>{{count($showTime->tickets()->get())}}</td>
          </tr>
        @endforeach
      </table>
    @endif
  </div>
@endsection
