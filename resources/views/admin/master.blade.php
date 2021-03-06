<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">




  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('admin')}}">Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @if (!Auth::guest())
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Welcome {{ Auth::user()->first_name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>

          @endif
          </ul>
          <form class="" action="{{url('admin/link')}}" method="post">
            {{csrf_field()}}
            <button type="submit" name="button">Refresh routes</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">

          <ul class="nav nav-sidebar">

            <li><a href="{{url('admin/admin')}}">Informations</a></li>
            <li><a href="{{url('admin/user')}}">Users</a></li>
            <li><a href="{{url('admin/post')}}">Posts</a></li>
            <li><a href="{{url('admin/category')}}">Categories</a></li>
            <li><a href="{{url('admin/image')}}">Images</a></li>
            <li><a href="{{url('admin/role')}}">Roles</a></li>


          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    {{-- TinyMCE  --}}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
    tinymce.init({
          selector: 'textarea',
          height: 500,
          extended_valid_elements: 'img[class=myclass|!src|border:0|alt|title|width|height|style]',
          invalid_elements: 'strong,b,em,i',
          content_css: [
            '//www.tinymce.com/css/codepen.min.css'
          ]
        });
        jQuery(document).ready(function($){
$('#selectall').click(function(event) {
$( ' input[type="checkbox"]' ).prop('checked', this.checked)
}),
$('#show').click(function(event) {
$("label:contains('index') input[type='checkbox']" ).prop('checked', this.checked)
}),
$('#create').click(function(event) {
$("label:contains('index') input[type='checkbox'],  label:contains('create') input[type='checkbox'], label:contains('store') input[type='checkbox']" ).prop('checked', this.checked)
}),
$('#update').click(function(event) {
$("label:contains('index') input[type='checkbox'],  label:contains('edit') input[type='checkbox'], label:contains('update') input[type='checkbox']" ).prop('checked', this.checked)
}),
$('#delete').click(function(event) {
$("label:contains('index') input[type='checkbox'],  label:contains('destroy') input[type='checkbox']" ).prop('checked', this.checked)
})


 });
    </script>
</html>
