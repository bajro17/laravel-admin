@extends('admin.master')
@section('content')

  <form action="{{url('admin/role/'.$role->id)}}" method="post">


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

    <button type="submit" class="btn btn-default">Save</button>
  </form>
@endsection
