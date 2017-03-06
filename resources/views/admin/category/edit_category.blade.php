@extends('admin.master')
@section('content')
  <form action="{{url('category/'.$category->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    {{-- Validation errors list --}}
    @foreach ($errors->all() as $error)
      <div class="text-danger">
        {{$error}}
      </div><br>
    @endforeach
    {{-- Deactivation info --}}

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description">{{$category->description}}</textarea>
    </div>

    <div class="checkbox">
      <label>
        <input type="checkbox" name="active[]" @if ($category->active == 1) value="1" checked @endif>
      </label>
    </div>
    <button type="submit" class="btn btn-default">Save</button>
  </form>
@endsection
