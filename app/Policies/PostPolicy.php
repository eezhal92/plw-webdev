<?php

namespace App\Policies;

class PostPolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update($user, $post)
    {
        return $user->id === $post->user_id;
    }

    public function delete($user, $post)
    {
        return $user->id === $post->user_id;
    }
}
