@extends('admin.master')
@section('content')
<<<<<<< HEAD
  <a href="{{url('admin/role/create')}}" class="btn btn-success">Create New</a>
=======
  <a href="{{url('role/create')}}" class="btn btn-success">Create New</a>
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
  @if (Session::has('delete'))
    <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('delete')}}
</div>
  @endif
  {{-- Update info --}}
  @if (Session::has('message'))
    <div class="alert alert-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
  @endif
  {{-- Deactivation info --}}
<<<<<<< HEAD

=======
  @if (Session::has('deactivation'))
    <div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('deactivation')}}
</div>
  @endif
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
  <table class="table table-striped">
    <tr>
      <th>Name</th>
      <th>Description</th>
<<<<<<< HEAD

=======
      <th>Permissions</th>
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($roles as $role)
    <tr>
      <td>{{$role->name}}</td>
<<<<<<< HEAD
      <td>{{str_limit($role->description,15)}}</td>
      <td><a href="{{url('admin/role/'.$role->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a></td>
      <td><form class="" action="{{url('admin/role/'.$role->id)}}" method="post">
=======
      <td>{{$role->description}}</td>
      <td>{{str_limit($role->description,15)}}</td>
      <td>{{$role->permissions}}</td>
      <td><a href="{{url('role/'.$role->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a></td>
      <td><form class="" action="{{url('role/'.$role->id)}}" method="post">
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <button type="submit" name="button" class="btn btn-danger btn-sm">Delete</button>

      </form></td>
    </tr>
    @endforeach
  </table>
@endsection
