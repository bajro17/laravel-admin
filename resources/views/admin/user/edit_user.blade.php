@extends('admin.master')
@section('content')

  <form action="{{url('admin/user/'.$user->id)}}" method="post">
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
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}">
    </div>
    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
    </div>

    <div class="checkbox">
      <label>
        <input type="checkbox" name="active" @if ($user->active == 1) value="1" checked @endif>Active
      </label>
    </div>
    <div class="form-group">
      <label for="role">Roles</label>

    </div>
    @foreach ($roles as $role)
      <div class="checkbox col-md-3">
    <label>
      <input class="pro" type="checkbox"  name="roles[]" value="{{$role->id}}" @if ($user->hasRole($role->id)) checked

      @endif> {{$role->name}}
    </label>
  </div>
    @endforeach
    <div class="form-group">
<button type="submit" class="btn btn-default">Save</button>
    </div>
  </form>
@endsection
