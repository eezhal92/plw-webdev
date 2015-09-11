<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>plw webdev - @yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 class="page-header" style="text-align:center;"><a href="{{ url('/') }}"><small><i> &lt;plw-webdev &sol;&gt; </i></small></a> @if(Auth::check())<a href="{{ url('auth/logout') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Log Out</a>
            @else
            <a href="{{ url('auth/github') }}" class="btn btn-default pull-right"><i class="fa fa-github"></i> Log In</a>
            @endif
          </h1>

          @include('layout.alert')

          @yield('content')

        </div>
      </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('.btn-delete').click(function() {
          var url = $(this).data('url');

          if(confirm("Are you sure want to delete this?")) {
            $.post(url, {
              _method: 'delete'
            })
            .done(function(message) {
              alert("Deleted! " + message);
              window.location.reload();
            })
            .fail(function(response) {
              alert("Error " + response.statusText + ": " + response.responseText);
            });
          }

          return false;
        });
      });
    </script>
  </body>
</html>
