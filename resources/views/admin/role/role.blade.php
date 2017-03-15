@extends('admin.master')
@section('content')
  <a href="{{url('admin/role/create')}}" class="btn btn-success">Create New</a>
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

  <table class="table table-striped">
    <tr>
      <th>Name</th>
      <th>Description</th>

      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($roles as $role)
    <tr>
      <td>{{$role->name}}</td>
      <td>{{str_limit($role->description,15)}}</td>
      <td><a href="{{url('admin/role/'.$role->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a></td>
      <td><form class="" action="{{url('admin/role/'.$role->id)}}" method="post">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <button type="submit" name="button" class="btn btn-danger btn-sm">Delete</button>

      </form></td>
    </tr>
    @endforeach
  </table>
@endsection
