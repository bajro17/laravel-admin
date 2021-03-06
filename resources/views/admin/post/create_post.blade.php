@extends('admin.master')
@section('content')
  <form action="{{url('admin/post')}}" method="post">
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
      <label for="story">story</label>
      <textarea class="form-control" id="story" name="story"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Save</button>
  </form>
@endsection
