<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

    public function login()
    {
    	return view('sessions.create');
    }

    public function store()
    {
    	// Attempt to auth. the user
    	if(! auth()->attempt(request(['email', 'password'])) ) {
			return back()->withErrors([
				'message' => 'Please check your credentials and try again.'
			]);
		}

    	// If so, sign in.

    	// If not, redirect to login
    	return redirect()->home();
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }
}
