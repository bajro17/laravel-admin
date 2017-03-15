@extends('admin.master')
@section('content')
<<<<<<< HEAD
  <form action="{{url('admin/role/'.$role->id)}}" method="post">
=======
  <form action="{{url('post/'.$role->id)}}" method="post">
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
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
<<<<<<< HEAD
      <label for="name">name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
    </div>
    <div class="form-group">
      <label for="description">Short Description</label>
      <input class="form-control" id="description" name="description" value="{{$role->description}}"/>
    </div>
    <div class="form-group">
    <input type="checkbox" name="" value="" id="toggle-button">Select all
  </div>
    @foreach ($links as $link)
      <div class="checkbox col-md-3">
    <label>
      <input class="pro" type="checkbox"  name="link[]" value="{{$link->id}}" @if ($role->hasLink($link->id)) checked

      @endif> {{$link->name}}
    </label>
  </div>
    @endforeach
=======
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

>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
    <button type="submit" class="btn btn-default">Save</button>
  </form>
@endsection
