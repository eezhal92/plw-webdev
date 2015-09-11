@extends('layout.master')

@section('page_title', 'Create New Post')

@section('content')

  <div class="row">

    <div class="col-md-8">
      <h2>Create New Post</h2>
      <form action="{{ route('posts.store') }}" method="post">
        {!! csrf_field() !!}

        <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
          <label>Title</label>
          <input type="text" name="title" class="form-control" placeholder="Awesome title goes here...">
          {!! ($errors->has('title')) ? $errors->first('title', '<span class="help-block">:message</span>') : '' !!}
        </div>

        <div class="form-group {{ ($errors->first('body')) ? 'has-error' : '' }}">
          <label>Body</label>
          <textarea name="body" rows="3" class="form-control" placeholder="Just spit awesome here..."></textarea>
          {!! ($errors->has('body')) ? $errors->first('body', '<span class="help-block">:message</span>') : '' !!}
        </div>

        <div class="form-group {{ ($errors->first('member')) ? 'has-error' : '' }}">
          <label>Visible only for member?</label>
          <div class="radio">
            <label>
              <input type="radio" name="member" value="1"> Yes
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="member" value="0" checked> No
            </label>
          </div>
          {!! ($errors->has('member')) ? $errors->first('member', '<span class="help-block">:message</span>') : '' !!}
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-default" name="button">
            <i class="fa fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>

    <div class="col-md-4">
      @include('layout.sidebar')
    </div>

  </div>

@endsection
