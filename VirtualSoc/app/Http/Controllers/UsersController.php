<?php

namespace app\Http\Controllers;

use app\User;
use app\Post;
use Illuminate\Http\Request;
use DB;
use Auth;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->get('name');
        $users = User::where('users.name', 'LIKE', "%$name%")->get();
        return view('app.search',compact('users'));
    }

    public function profile($userId)
    {
        $first = array(User::find($userId));
        $users = collect($first);
        return view('app.search',compact('users'));
    }

    public function posts($userId)
    {
        $user = User::find($userId);
        $posts = collect();
        foreach($user->posts as $post)
            $posts->prepend($post);

        return view('app.home',compact('posts')); 
    }

    public function postsDestroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        return back();
    }



    public function friends()
    {
        $friends = Auth::user()->friends;
        return view('app.friends',compact('friends'));
    }

    public function friendsDestroy($id)
    {
        $user = User::find($id);
        Auth::user()->friends()->detach($user);
        return back();
    }

}
