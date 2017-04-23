<?php

namespace app\Http\Controllers;

use app\Profile;
use Illuminate\Http\Request;
use Auth;

class RequestsController extends Controller
{
   //requests
    public function indexRequests()
    {
        $users = Auth::user()->requested;
        return view('app.requests',compact('users'));
    }

    public function indexRequesting()
    {
        $users = Auth::user()->requesting;
        return view('app.requesting',compact('users'));
    }

    public function store(Request $request)
    {
        Auth::user()->addRequest($request->id);
        return back();     
    }

    public function destroy(Request $request)
    {
        Auth::user()->deleteRequest($request->id);
        return back();  
    }

    public function accept(Request $request)
    {
        Auth::user()->acceptRequest($request->id);
        return back();  
    }
}