@extends('layout.master')

@section('page_title', 'List of Your Posts')

@section('content')

  <div class="row">

    <div class="col-md-8">
      <h2>List of Your Posts</h2>
      @foreach($posts as $post)
        <div class="">
          <h2><a href="{{ route('articles.show', $post->slug)}}">{{ $post->title }}</a></h2>
          <p>
            {{ str_limit($post->body, 120, '...') }}
          </p>
          <hr>
          <i class="fa fa-calendar"></i> {{ $post->created_at->format('M d, Y h:i') }}
          @if($post->member)
          &nbsp; <span class="label label-success">MEMBER</span>
          @endif
          @can('update', $post)
            <a href="#" class="btn btn-xs btn-danger btn-delete pull-right" data-url="{{ route('posts.destroy', $post->id) }}" style="margin-left: 5px;"><i class="fa fa-trash"></i> Delete</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-warning pull-right"><i class="fa fa-pencil"></i> Edit</a>
          @endcan
          <hr>
        </div>
        <br>
      @endforeach

      {!! $posts->setPath('')->appends(Request::except('page'))->render() !!}
    </div>

    <div class="col-md-4">
      @include('layout.sidebar')
    </div>

  </div>

@endsection
