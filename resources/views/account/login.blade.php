@extends('layout.master')

@section('page_title', 'Login')

@section('content')

  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Please Login</strong>
        </div>
        <div class="panel-body">
          <a href="{{ url('account/github') }}" class="btn btn-default"><i class="fa fa-github"></i>  Github</a>
          
          <!-- <form class="" action="#" method="get">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Your email...">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Your password...">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="login"><i class="fa fa-sign-in"></i> Log In</button>
            </div>
          </form> -->
        </div>
      </div>
    </div>
  </div>
@endsection
