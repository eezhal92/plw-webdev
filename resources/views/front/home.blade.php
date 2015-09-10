@extends('layout.master')

@section('page_title', 'Home')

@section('content')

    <div class="row">
      <div class="col-md-8">
        @foreach($posts as $post)
          <div class="">
            <h2>{{ $post->title }}</h2>
            <p>
              {{ str_limit($post->body, 120, '...') }}
            </p>
            <hr>
            <i class="fa fa-user"></i> {{ $post->user->username }}
            <hr>
          </div>
          <br>
        @endforeach
      </div>

      <div class="col-md-4">
        @if(Auth::user())
        <div class="panel panel-default">
          <div class="panel-heading">
            <b>Your Details:</b>
          </div>
          <div class="panel-body">

            <div class="row">
              <div class="col-md-4">
                <img src="{{ Auth::user()->avatar }}" class="img img-responsive"alt="" /><br>
              </div>

              <div class="col-md-8">

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
