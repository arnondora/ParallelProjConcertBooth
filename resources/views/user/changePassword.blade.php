@extends('components.template')

@section('title', 'Change Password')

@section('content')
  <div class = "row"><h1>Change Password</h1></div>

  @include('components.signs')

  <div class = "row" style = "margin-top:15px;">
    <form method = "post" action = "/user/edit/password" enctype="multipart/form-data">

      <div class = "form-group">
        <label>Username <span class="text-danger">(*)</span></label>
        <input type="text" name="username" class = "form-control" value="{{old('username')}}">
      </div>

      <div class = "form-group">
        <label>Old Password <span class="text-danger">(*)</span></label>
        <input type="password" name="oldpassword" class = "form-control" value="{{old('oldpassword')}}">
      </div>

      <div class = "form-group">
        <label>New Password <span class="text-danger">(*)</span></label>
        <input type="password" name="newpassword" class = "form-control">
      </div>

      <div class = "form-group">
        <label>New Password <span class="text-danger">(*)</span></label>
        <input type="password" name="newpassword_confirmation" class = "form-control">
      </div>


      <div class = "form-group">
        {{csrf_field()}}
        <input type="submit" class = "btn btn-success" value = "Change Password">
      </div>

    </form>
  </div>
@endsection
