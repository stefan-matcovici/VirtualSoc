<?php

namespace app\Http\Controllers;

use app\Post;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('app.posts',compact('posts'));
    }

    public function create(Request $request)
    {
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->content = $request->content;
        $post->save();
        return back();
    }

    public function like($postId)
    {
        Post::find($postId)->like(Auth::user());

        return back();
    }

    public function dislike($postId)
    {
        Post::find($postId)->dislike(Auth::user());

        return back();
    }

    public function unlike($postId)
    {
        Post::find($postId)->likes()->detach(Auth::user());

        return back();
    }

    public function undislike($postId)
    {
        Post::find($postId)->dislikes()->detach(Auth::user());

        return back();
    }

    public function share($postId)
    {
        $post = Post::find($postId);
        $newPost = new Post;
        $newPost->user_id = Auth::user()->id;
        $newPost->content = $post->content;
        $newPost->save();

        return back();
    }

}
