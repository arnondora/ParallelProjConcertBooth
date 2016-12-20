@extends('components.template')

@section('title', 'Reserve new Ticket')

@section('content')
  <div class = "row"><h1>Reserve new Ticket</h1></div>

  @include('components.signs')
  <div class = "row">
    <form action = "/ticket/add/finalise" method="post">

      <div class = "form-group">
        <label>Show : <strong>{{$show->name}}</strong></label>
      </div>

      <div class = "form-group">
        <label>Showtime : </label>
        <select class="form-control" name="showtime">
          @foreach ($show->ConcertTime()->get() as $showtime)
            <option value="{{$showtime->id}}">{{$showtime->showDate}}</option>
          @endforeach
        </select>
      </div>

      <div class = "form-group">
        <label>Ticket Type : </label>
        <select class="form-control" name="type">
          @foreach ($ticketTypes as $ticketType)
            <option value="{{$ticketType->id}}">{{$ticketType->name}} ({{$ticketType->price}} Baht)</option>
          @endforeach
        </select>
      </div>

      <div class = "form-group">
        <label>Name : </label>
        <input type="text" class = "form-control" name="name" value="{{old('name')}}">
      </div>

      <div class = "form-group">
        <label>Email : </label>
        <input type="text" class = "form-control" name="email" value="{{old('email')}}">
      </div>

      <div class = "form-group">
        <label>Telephone : </label>
        <input type="text" class = "form-control" name="telephone" value="{{old('telephone')}}">
      </div>

      <div class = "form-group">
        {{csrf_field()}}
        <input type="submit" class = "btn btn-success" value="Next">
      </div>

    </form>
  </div>
@endsection
