<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PLW Webdev - @yield('page_title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 class="page-header">PLW Webdev @if(Auth::check())<a href="{{ url('auth/logout') }}" class="btn btn-warning pull-right"><i class="fa fa-power-off"></i> Log Out</a>@else <a href="{{ url('auth/logout') }}" class="btn btn-primary pull-right"><i class="fa fa-sign-in"></i> Log In</a> @endif</h1>

          @yield('content')

        </div>
      </div>
    </div>
  </body>
</html>
