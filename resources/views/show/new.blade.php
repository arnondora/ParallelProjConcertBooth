@extends('components.template')

@section('title', 'Add New Show')

@section('content')
  <div class = "row"><h1>Add New Show</h1></div>

  @include('components.signs')

  <div class = "row" style = "margin-top:15px;">
    <form method = "post" action = "/show/add" enctype="multipart/form-data">
      <div class = "form-group">
        <label>Show Name <span class="text-danger">(*)</span></label>
        <input type="text" name="name" class = "form-control" value="{{old('name')}}" autofocus="">
      </div>

      <div class = "form-group">
        <label>Show Description <span class="text-danger">(*)</span></label>
        <textarea name="description" class = "form-control" rows="8" cols="80"></textarea>
      </div>

      {{-- <div class = "form-group">
        <label>Show Thumbnail <span class="text-danger">(*)</span></label>
        <label class "text-warning">Image can be in .jpg only</label>
        <input type="file" name="thumbnail" class = "form-control">
      </div> --}}

      <div class = "form-group">
        {{csrf_field()}}
        <input type="submit" class = "btn btn-success" value = "New Show">
      </div>

    </form>
  </div>
@endsection
