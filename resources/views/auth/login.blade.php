@extends('layout.master')

@section('page_title', 'Login')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Please Login</strong>
        </div>
        <div class="panel-body">
          <a href="{{ url('auth/github') }}" class="btn btn-default btn-lg btn-block"><i class="fa fa-github"></i>  Github</a>

        </div>
      </div>
    </div>
  </div>
@endsection
