@extends('components.template')

@section('title', 'Your Login Information')

@section('content')
  <div class = "row"><h1>Your Login Information</h1></div>

  <div class = "row">
    <strong>Now, you can login with the following username and password</strong>
  </div>

  <div class = "row">
    <p>Username : {{$username}}</p>
    <p>Password : {{$password}}</p>
  </div>

  <div class = "row">
    <strong class= "text-danger">Please keep your username and password in the safe place</strong>
  </div>

  <div class = "row">
    <a href = "/dashboard/user" class = "btn btn-success">Finish Creating Account</a>
  </div>

@endsection
