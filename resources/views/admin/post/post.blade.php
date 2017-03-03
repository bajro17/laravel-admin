@extends('admin.master')
@section('content')
  <a href="{{url('post/create')}}" class="btn btn-success">Create New</a>
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
  @if (Session::has('deactivation'))
    <div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('deactivation')}}
</div>
  @endif
  <table class="table table-striped">
    <tr>
      <th>Author</th>
      <th>Title</th>
      <th>Story</th>
      <th>Active</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
      <td>{{$post->user->first_name}}</td>
      <td>{{$post->title}}</td>
      <td>{{str_limit($post->story,15)}}</td>
      <td>{{$post->active}}</td>
      <td><a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a></td>
      <td><form class="" action="{{url('post/'.$post->id)}}" method="post">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <button type="submit" name="button" class="btn btn-danger btn-sm">Delete</button>

      </form></td>
    </tr>
    @endforeach
  </table>
@endsection
