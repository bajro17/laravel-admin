@extends('admin.master')
@section('content')
<<<<<<< HEAD
  <form action="{{url('admin/role')}}" method="post">
=======
  <form action="{{url('post')}}" method="post">
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
    {{csrf_field()}}

    {{-- Validation errors list --}}
    @foreach ($errors->all() as $error)
      <div class="text-danger">
        {{$error}}
      </div><br>
    @endforeach
<<<<<<< HEAD
    <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Need help?
</a>

<div class="collapse" id="collapseExample">
  <div class="well">
    <p class="text-danger">*index - To see all content of instance</p>
    <p class="text-danger">*create - Form for create new instance</p>
    <p class="text-danger">*store - To create new instance</p>
    <p class="text-danger">*edit - Form for edit instance</p>
    <p class="text-danger">*update - Update instance</p>
    <p class="text-danger">*destroy - Delete instance</p>
  </div>
</div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input class="form-control" id="description" name="description"/>
    </div>
    <div class="form-group">
    <input type="checkbox" name="" value="" id="toggle-button">Select all
  </div>
    @foreach ($links as $link)
      <div class="checkbox col-md-3">
        <label>
          <input type="checkbox" name="link[]" value="{{$link->id}}">{{$link->name}}
        </label>
      </div>
    @endforeach
=======

    <div class="form-group">
      <label for="title">Name</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="story">Description</label>
      <textarea class="form-control" id="story" name="story"></textarea>
    </div>
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707

    <button type="submit" class="btn btn-default">Save</button>
  </form>
@endsection
