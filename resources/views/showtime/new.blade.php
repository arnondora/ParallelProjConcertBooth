@extends('components.template')

@section('title', 'Add New Showtime')

@section('content')
  <div class = "row"><h1>Add New Showtime</h1></div>

  @include('components.signs')

  <div class = "row" style = "margin-top:15px;">
    <form method = "post" action = "/show/time/add" enctype="multipart/form-data">
      <div class = "form-group">
        <strong>Show Name : {{$show->name}}</strong>
      </div>

      <div class = "form-group">
        <label>Show Date And Time <span class="text-danger">(*)</span></label> (mm/dd/yyyy, hh-mm mm)
        <input type="datetime-local" class = "form-control" name="datetime" required="">
      </div>

      <div class = "form-group">
        {{csrf_field()}}
        <input type = "hidden" name = "showid" value = "{{$show->id}}">
        <input type="submit" class = "btn btn-success" value = "New Showtime">
      </div>

    </form>
  </div>
@endsection
