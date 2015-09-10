<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();

        factory('App\User', 3)->create()->each(function($user) {
            $user->posts()->save(factory('App\Post')->create());
        });
    }
}
