@extends('components.template')

@section('title', 'Login')

@section('content')
  <div class = "row">
    <h1>Ticket Booth Login</h1>
  </div>

  <div class = "row">
    <form action="/login" method="post">
      <div class = "form-group">
        <label>Username</label>
        <input type = "text" name = "username" value = "{{old('username')}}" autofocus="" class = "form-control" required="">
      </div>

      <div class = "form-group">
        <label>Password</label>
        <input type = "password" name = "password" value = "{{old('password')}}" class = "form-control" required="">
      </div>

      <div class = "form-group">
        Access your account first time ? <a href = "/user/edit/password">Change Your Password First</a>
      </div>

      <div class = "form-group">
        {{csrf_field()}}
        <input type = "submit" class = "btn btn-success" value = "Login">
      </div>
    </form>
  </div>

  @if (count($errors->all()) < 0)
    <div class = "form-group">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

@endsection
