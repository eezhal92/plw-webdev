<?php

Route::get('auth/login', 'AuthController@getLogin');
Route::get('account/github', 'AuthController@redirectToProvider');
Route::get('account/github/callback', 'AuthController@handleProviderCallback');

Route::group(['middleware' =>'auth'], function() {

  get('dashboard', function() {
    echo '<img src="'. Auth::user()->avatar .'" />';
    return 'youre logged in';
  });

});
