@extends('components.template')

@section('title', 'Ticket Type Management')

@section('content')
  <div class = "row"><h1>Ticket Type Management</h1></div>

  @include('components.signs')

  <div class = "row">
    <a href = "/ticket/type/add"><i class="fa fa-plus" aria-hidden="true"></i> Create New Type</a>
  </div>

  <div class = "row" style = "margin-top:15px;">
    @if(count($ticketTypes) > 0)
      <table class = "table">
        <tr>
          <td>Name</td>
          <td>Price</td>
          <td>No. of seat</td>
        </tr>

        @foreach ($ticketTypes as $type)
          <tr>
            <td>{{$type->name}}</td>
            <td>{{$type->price}}</td>
            <td>{{$type->seat}}</td>
          </tr>
        @endforeach
      </table>
      @else
        <h2>There's no ticket type. Please create before open booth.</h2>
    @endif
  </div>
@endsection
