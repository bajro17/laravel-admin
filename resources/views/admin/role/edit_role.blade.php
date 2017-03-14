@extends('admin.master')
@section('content')
  <form action="{{url('post/'.$role->id)}}" method="post">
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
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description">{{$role->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="permissions">Permissions</label>
      <textarea class="form-control" id="permissions" name="permissions">{{$role->permissions}}</textarea>
    </div>

    <button type="submit" class="btn btn-default">Save</button>
  </form>
@endsection
