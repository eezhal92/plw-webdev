<?php

get('/', 'HomeController@index');

get('auth/login', 'Auth\AuthController@getLogin');
get('auth/github', 'Auth\AuthController@redirectToProvider');
get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['middleware' =>'auth'], function() {

  get('dashboard', function() {
    echo '<img src="'. Auth::user()->avatar .'" />';
    return 'youre logged in';
  });

  get('auth/logout', function() {
    \Auth::logout();

    return redirect('/');
  });


});
