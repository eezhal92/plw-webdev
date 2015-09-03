<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Socialite;
use Auth;

class AuthController extends Controller
{

  protected $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }
  /**
   * Menampilkan halaman login.
   *
   * @return Response
   */
  public function getLogin()
  {
    return view('account.login');
  }
  /**
   * Redirect user ke halaman otentikasi GitHub.
   *
   * @return Response
   */
  public function redirectToProvider()
  {
      return Socialite::driver('github')->redirect();
  }

  /**
   * Menerima informasi user dari GitHub.
   *
   * @return Response
   */
  public function handleProviderCallback()
  {
      $github_user = Socialite::driver('github')->user();
      // $user->token;

      $user = $this->user->where('username', $github_user->nickname)->first();
      // dd($github_user->email);
      if(!$user) {
        $user = $this->user->create([
          'username' => $github_user->nickname,
          'name' => $github_user->name,
          'email' => $github_user->email,
          'avatar' => $github_user->avatar
        ]);
      }
      Auth::login($user, true);

      return redirect('dashboard');
  }

}
