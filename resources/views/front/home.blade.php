@extends('layout.master')

@section('page_title', 'Home')

@section('content')

  <div class="row">
    <div class="col-md-8">
    </div>

    <div class="col-md-3 col-md-offset-1">
      @if(Auth::user())
      <div class="panel panel-default">
        <div class="panel-heading">
          <b>Your Details:</b>
        </div>
        <div class="panel-body">

          <div class="row">
            <div class="col-md-6">
              <img src="{{ Auth::user()->avatar }}" class="img img-responsive"alt="" /><br>
            </div>

            <div class="col-md-6">

              <div class="">
                <span>Username</span>
                <label for="">{{ Auth::user()->username }}</label>
              </div>

              <div class="">
                <span>Name</span>
                <label for="">{{ Auth::user()->name }}</label>
              </div>

            </div>

          </div>

        </div>
      </div>
      @endif
    </div>
  </div>
@endsection
