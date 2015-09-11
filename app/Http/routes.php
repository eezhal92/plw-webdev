<?php

get('/', 'HomeController@home');
get('/articles/{slug}', [
    'as' => 'articles.show',
    'uses' => 'HomeController@showArticle'
]);
get('/user/{username}/articles', function() {

});
get('auth/github', 'Auth\AuthController@redirectToProvider');
get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['middleware' =>'auth'], function() {

  get('auth/logout', function() {
      \Auth::logout();

      return redirect('/');
  });

  resource('posts', 'PostController');

});
