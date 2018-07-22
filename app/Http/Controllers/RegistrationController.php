<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegistrationController extends Controller
{
	function __construct()
	{
		$this->middleware('guest');
	}
	
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	// Validate form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);
    	
    	// Create and save user
    	$user = User::create(request(['name', 'email', 'password']));

    	// Signin user
    	auth()->login($user);

    	// Redirect to home page
    	return redirect()->home();
    }
}