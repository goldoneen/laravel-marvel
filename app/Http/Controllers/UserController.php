<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  //
  public function index()
  {
    $users = User::all();
    return view('users.index', ['users' => $users]);
  }
  // Show the form for creating a new user
  public function create()
  {
    return view('users.create');
  }

  // Store a newly created user in the database
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:8',
    ]);
    $user = User::create($validatedData);
    return redirect()->route('users.show', ['user' => $user->id]);
  }

  // Show a specific user
  public function show(User $user)
  {
    return view('users.show', ['user' => $user]);
  }

  // Show the form for editing a user
  public function edit(User $user)
  {
    return view('users.edit', ['user' => $user]);
  }
  
  // Update a specific user in the database
  public function update(Request $request, User $user)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email,' . $user->id,
      'password' => 'nullable|string|min:8',
    ]);
    $user->update($validatedData);
  }
}
