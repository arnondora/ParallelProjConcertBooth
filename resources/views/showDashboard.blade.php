@extends('components.template')

@section('title', 'Show Management')

@section('content')
  <div class = "row"><h1>Show Management</h1></div>

  @include('components.signs')

  <div class = "row">
    <a href = "/show/add"><i class="fa fa-plus" aria-hidden="true"></i> Create New Show</a>
  </div>

  <div class = "row" style = "margin-top:15px;">
    @if(count($shows) > 0)
      <table class = "table">
        <tr>
          <td>Name</td>
          <td>Desctipion</td>
          <td>Delete</td>
        </tr>

        @foreach ($shows as $show)
          <tr>
            <td><a href = "/show/{{$show->id}}/edit">{{$show->name}}</a></td>
            <td>{{$show->description}}</td>
            <td>
              <form action = "/show/delete" method="post">
                <input type = "hidden" name = "_method" value = "delete">
                <input type="hidden" name="id" value="{{$show->id}}">
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
