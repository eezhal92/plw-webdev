<!-- Wrapped by: div.col-md-4 -->

@if(Auth::user())
<div class="panel panel-default">
  <div class="panel-heading">
    <b>My Details</b>
  </div>
  <div class="panel-body">

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <img src="{{ Auth::user()->avatar }}" class="img img-responsive"alt="" /><br>
      </div>

      <div class="col-md-8 col-md-offset-2">

        <div class="">
          <span>Username</span><br>
          <label for="">{{ Auth::user()->username }}</label>
        </div>

        @if(!empty(Auth::user()->name))
        <div class="">
          <span>Name</span><br>
          <label for="">{{ Auth::user()->name }}</label>
        </div>
        @endif

        <div class="">
          <span>Role</span><br>
          <label for="">{{ (Auth::user()->admin) ? 'Admin' : 'Member' }}</label>
        </div>

      </div>

    </div>

  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <b>My Posts</b>
  </div>
  <div class="panel-body">
    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Create New</a>
    <a href="{{ route('posts.index') }}" class="btn btn-info btn-block"><i class="fa fa-folder-open"></i> Lists</a>
  </div>
</div>
@endif
