<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = auth()->user()->posts()->orderBy('created_at', 'desc')->simplePaginate(5);

        return view('front.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('front.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required|min:3',
          'body' => 'required|min:3',
          'member' => 'required|boolean',
        ]);

        $fields = $request->all();
        $fields['slug'] = str_slug($request->title);

        $post = $request->user()->posts()->save(Post::create($fields));

        if($post) {
          return redirect()->route('posts.index')->with('success', 'Successfully created a post!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      try {
        $post = Post::findOrFail($id);
      } catch(\Exception $e) {
        return redirect('/')->with('error', $e->getMessage());
      }

      if(Gate::denies('update', $post)) {
        return redirect('/')->with('error', 'Aborted! That post is not your own.');
      }

      return view('front.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required|min:3',
        'body' => 'required|min:3',
        'member' => 'required|boolean',
      ]);

      $fields = $request->all();
      $fields['slug'] = str_slug($request->title);
      $fields['member'] = (boolean) $fields['member'];

      try {
        $post = Post::findOrFail($id);
        $post->update($fields);
      } catch(\Exception $e) {
        return redirect('')->route('posts.index')->with('error', $e->getMessage());
      }

      if($post) {
        return redirect()->route('posts.index')->with('success', 'Successfully updated the post!');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
      if($request->ajax()) {
        try {
          $post = Post::findOrFail($id);

          if(Gate::denies('delete', $post)) {
            return response()->make("Aborted! That post is not yours.");
          }

          if($post->delete()) {
            return response()->make("Post successfully been deleted.", 200);
          }
        } catch(\Exception $e) {
          return response()->make($e->getMessage(), 404);
        }
      }
    }
}
