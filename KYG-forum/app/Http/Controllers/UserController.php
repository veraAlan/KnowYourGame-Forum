<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    // Display a listing of the users
    public function index()
    {
        $users = User::get();
        return view('test.users.index', ['users' => $users]);
    }


    // Show the form for creating a new user
    public function create(User $users)
    {
        return view('test.users.create', ['users' => $users]);
    }


    // Store a newly created user in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required',],
            'email' => ['required',],
            'password' => ['required'],
        ]);
        User::create($validated);
        session()->flash('status', 'User creado!');
        return redirect()->route('test.users.index');
    }


    // Display the specified user
    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('test.users.show', ['users' => $users]);
    }


    // Show the form for editing the specified user
    public function edit(User $users)
    {
        return view('test.users.edit', ['users' => $users]);
    }


    // Update the specified user in storage
    public function update(Request $request, User $users)
    {
        $validated = $request->validate([
            'name' => ['required',],
            'email' => ['required',],
            'password' => ['required'],
        ]);
        $users->update($validated);
        session()->flash('status', 'User actualizado!');
        return redirect()->route('test.users.index');
    }


    // Remove the specified user from storage
    public function destroy(User $users)
    {
        $users->delete();
        session()->flash('status', 'User eliminado!');
        return to_route('test.users.index');
    }
}
