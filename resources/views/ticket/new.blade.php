@extends('components.template')

@section('title', 'Reserve new Ticket')

@section('content')
  <div class = "row"><h1>Reserve new Ticket</h1></div>

  @include('components.signs')
  <div class = "row">
    <form action = "/ticket/add" method="post">

      <div class = "form-group">
        <label>Select Show :</label>
        <select class="form-control" name="concert">
          @foreach ($shows as $show)
            <option value="{{$show->id}}">{{$show->name}}</option>
          @endforeach
        </select>
      </div>

      <div class = "form-group">
        {{csrf_field()}}
        <input type="submit" class = "btn btn-success" value="Next">
      </div>

    </form>
  </div>
@endsection
