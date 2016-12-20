@extends('components.template')

@section('title', 'Add New User')

@section('content')
  <div class = "row"><h1>Add New User</h1></div>

  @include('components.signs')

  <div class = "row" style = "margin-top:15px;">
    <form method = "post" action = "/user/add" enctype="multipart/form-data">
      <div class = "form-group">
        <label>Name <span class="text-danger">(*)</span></label>
        <input type="text" name="name" class = "form-control" value="{{old('name')}}" autofocus="">
      </div>

      <div class = "form-group">
        <label>Surname <span class="text-danger">(*)</span></label>
        <input type="text" name="surname" class = "form-control" value="{{old('surname')}}">
      </div>

      <div class = "form-group">
        <label>Email <span class="text-danger">(*)</span></label>
        <input type="email" name="email" class = "form-control" value="{{old('email')}}">
      </div>

      <div class = "form-group">
        <label>Username <span class="text-danger">(*)</span></label>
        <input type="text" name="username" class = "form-control" value="{{old('username')}}">
      </div>


      <div class = "form-group">
        {{csrf_field()}}
        <input type="submit" class = "btn btn-success" value = "New User">
      </div>

    </form>
  </div>
@endsection
