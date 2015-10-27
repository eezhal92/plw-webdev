<?php

get('/', [
  'middleware' => ['cache.fetch', 'cache.put'],
  'uses' => 'HomeController@home'
]);

get('/articles/{slug}', [
    'as' => 'articles.show',
    'uses' => 'HomeController@showArticle'
]);

get('/user/{username}/articles', [
  'middleware' => ['cache.fetch', 'cache.put'],
  'uses' => function($username) {
    return 'article of ' . $username;
  }
]);

get('auth/github', 'Auth\AuthController@redirectToProvider');

get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['middleware' =>'auth'], function() {

  get('auth/logout', function() {
      \Auth::logout();

      return redirect('/');
  });

  resource('posts', 'PostController');

});

get('test/search', function() {
  $keyword = \Request::get('keyword') || 'lorem';

  // Match any fields
  $posts = App\Post::search($keyword)->paginate();

  dd($posts);

  // Match all fields
  // Article::search($keyword, true)->paginate();
});

get('test/transaction', function() {

  \DB::transaction(function() {
    App\Post::findOrFail(8);

    $foo = App\Post::find(6)->delete();
  });
});
