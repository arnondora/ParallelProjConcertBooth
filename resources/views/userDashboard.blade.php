@extends('components.template')

@section('title', 'User Management')

@section('content')
  <div class = "row"><h1>User Management</h1></div>

  @include('components.signs')

  <div class = "row">
    <a href = "/user/add"><i class="fa fa-plus" aria-hidden="true"></i> Create New User</a>
  </div>

  <div class = "row" style = "margin-top:15px;">
    @if(count($users) > 0)
      <table class = "table">
        <tr>
          <td>Name</td>
          <td>Username</td>
          <td>E-mail</td>
          <td>Delete</td>
        </tr>

        @foreach ($users as $user)
          <tr>
            <td><a href = "/user/{{$user->id}}/edit">{{$user->name}} {{$user->surname}}</a></td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>
              <form action = "/user/delete" method="post">
                <input type="hidden" name="id" value="{{$user->id}}">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class = "btn btn-danger" type="submit"><span class = "fa fa-trash"></span></button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
      @else
        <h2>There's no show</h2>
    @endif
  </div>
@endsection
