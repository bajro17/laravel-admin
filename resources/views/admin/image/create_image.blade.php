@extends('admin.master')
@section('content')
  <form action="{{url('image')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    {{-- Validation errors list --}}
    @foreach ($errors->all() as $error)
      <div class="text-danger">
        {{$error}}
      </div><br>
    @endforeach

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="category">Select Categories</label>
    </div>
    @foreach ($categories as $category)
      <div class="checkbox">
    <label>
      <input type="checkbox"  name="category[]" value="{{$category->id}}"> {{$category->title}}
    </label>
  </div>
    @endforeach
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
      <label for="description">description</label>
      <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Save</button>
  </form>
@endsection
