<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Post as Post;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = collect();
        foreach(Auth::user()->friends as $friend)
            foreach($friend->posts as $post)
                $posts->prepend($post);

        return view('app.home',compact('posts'));
    }
}
