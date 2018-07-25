<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

use App\Http\Requests\RegistrationForm;


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

    public function store(RegistrationForm $form)
    {
        $form->persist();

        session()->flash('message', 'Thanks for signing up!');

    	// Redirect to home page
    	return redirect()->home();
    }
}
