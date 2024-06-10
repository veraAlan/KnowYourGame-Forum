<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{


    // Display a listing of the users
    public function index()
    {
        $user = User::all();
        return view('role.index', compact('user'));
    }


    // Show the form for creating a new user
    public function create(Request $request)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        
        $validated = $request->validate([
            'name' => 'required|min:2|max:25',
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::create($validated);
        $userId = $user->id;
    
        UserRole::create([
            'user_id' => $userId,
            'role_id' => 3
        ]);
    
        return redirect()->route('role.index')->with(['status' => 'created']);
    }



    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        User::find($request->input('id'))->update($validated);
        session()->flash('status', 'User actualizado!');
        return redirect()->route('role.index');
    }



    public function destroy(Request $request){

        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        User::find($request->input("id"))->delete();
        return redirect()->route('role.index')->with(['status' => 'deleted']);
    }
}
