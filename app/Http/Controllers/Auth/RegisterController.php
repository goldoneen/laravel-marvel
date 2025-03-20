<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User; // Assuming you have a User model

class RegisterController extends Controller
{
	//
	// use RegistersUsers;
	// Where to redirect users after registration.
	protected $redirectTo = '/home'; // Change '/home' to the desired redirect URL after successful registration.

	// Show the registration form.
	public function showRegistrationForm()
	{
		return view('auth.register'); // Replace 'auth.register' with the actual view path for your registration form.
	}

	// Handle a registration request for the application.
	protected function register(Request $request)
	{
		$this->validator($request->all())->validate();
		$user = $this->create($request->all());
		// You can add any additional logic or actions here after the user is successfully registered.
		return redirect($this->redirectPath());
	}

	// Get a validator for an incoming registration request.
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed',
		]);
	}

	// Create a new user instance after a valid registration.
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}
}
