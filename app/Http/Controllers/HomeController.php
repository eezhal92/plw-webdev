<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class HomeController extends Controller
{
    /**
     * Display homepage.
     *
     * @return Response
     */
    public function home()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('front.home', compact('posts'));
    }

    /**
     * Display specified post.
     *
     * @return Response
     */
     public function showArticle($slug)
     {
        try {
            $post = Post::where('slug', $slug)->firstOrFail();
        } catch(\Exception $e) {
            return redirect('/')->with('error', $e->getMessage());
        }

        if($post->member) {
            if(!auth()->check()) {
                return redirect('/')->with('error', 'Ooops! That post only can be viewed by member.');
            }
        }

        if (Gate::denies('see-member-type-post', $post)) {
            dd('forbidden');
        }

        return view('front.posts.show', compact('post'));
    }

}
