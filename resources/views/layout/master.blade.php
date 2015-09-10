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
      <h1 class="page-header">PLW Webdev</h1>

      @yield('content')
    </div>
  </body>
</html>
