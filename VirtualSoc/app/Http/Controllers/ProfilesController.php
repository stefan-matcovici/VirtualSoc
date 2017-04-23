<?php

namespace app\Http\Controllers;

use app\Profile;
use Illuminate\Http\Request;
use Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile;
        return view('app.profile',compact('profile'));
    }

    public function update(Request $request)
    {
        Auth::user()->profile->name=$request->name;
        Auth::user()->profile->surname=$request->surname;
        Auth::user()->profile->description=$request->description;
        Auth::user()->profile->date_of_birth=$request->date_of_birth;
        Auth::user()->profile->save();

        return back();
    }
}
