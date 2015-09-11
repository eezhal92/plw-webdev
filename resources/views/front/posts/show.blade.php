@extends('layout.master')

@section('page_title', $post->title)

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h2>{{ $post->title}}</h2><br>
      {!! $post->body !!}
    </div>
  </div>
@endsection
