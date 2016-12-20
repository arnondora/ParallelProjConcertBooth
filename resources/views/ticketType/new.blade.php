@extends('components.template')

@section('title', 'Create new Ticket Type')

@section('content')
  <div class = "row"><h1>Create new Ticket Type</h1></div>

  @include('components.signs')
  <div class = "row">
    <form action = "/ticket/type/add" method="post">
      <div class = "form-group">
        <label>Type Name :</label>
        <input type="text" class = "form-control" name="name" value="{{old('name')}}" required="">
      </div>

      <div class = "form-group">
        <label>Price :</label>
        <input type="number" min = "0" class = "form-control" name="price" value="{{old('price')}}" required="">
      </div>

      <div class = "form-group">
        {{csrf_field()}}
        <input type="submit" class = "btn btn-success" value="Add New Ticket Type">
      </div>

    </form>
  </div>
@endsection
