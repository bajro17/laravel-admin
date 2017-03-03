@extends('admin.master')
@section('content')
  {{-- Update info --}}
  @if (Session::has('message'))
    <div class="alert alert-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
  @endif
  {{-- Deactivation info --}}
  @if (Session::has('deactivation'))
    <div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('deactivation')}}
</div>
  @endif
  <table class="table table-striped">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
      <th>Email</th>
      <th>Active</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($users as $user)
    <tr>
      <td>{{$user->first_name}}</td>
      <td>{{$user->last_name}}</td>
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->active}}</td>
      <td><a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a></td>
      <td><form class="" action="{{url('user/'.$user->id)}}" method="post">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <button type="submit" name="button" class="btn btn-danger btn-sm">Delete</button>

      </form></td>
    </tr>
    @endforeach
  </table>
@endsection
