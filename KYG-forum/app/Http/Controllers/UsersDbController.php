<?php

namespace App\Http\Controllers;

use App\Models\UsersDb;
use Illuminate\Http\Request;

class UsersDbController extends Controller
{
    public function index()
    {
        return UsersDb::all();
    }

    public function create()
    {
        // return view('users.create');
        return view('test');
    }

    public function store(Request $request)
    {
        $user = UsersDb::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id)
    {
        // Mostrar un usuario específico
        // $user = UsersDb::findOrFail($id);
        // return view('users.show', compact('user'));
        $user = UsersDb::findOrFail($id);
        return view('test', ['user' => $user]);
    }

    public function edit($id)
    {
        // $user = UsersDb::findOrFail($id);
        // return view('users.edit', compact('user'));
        $user = UsersDb::findOrFail($id);
        return view('test', ['editUser' => $user]);
    }

    public function update(Request $request, $id)
    {
        // $user = UsersDb::findOrFail($id);
        // $user->update($request->all());
        // return redirect()->route('users.show', $user->id);
        $user = UsersDb::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users_db.show', $user->id);
    }

    public function destroy($id)
    {
        // $user = UsersDb::findOrFail($id);
        // $user->delete();
        // return redirect()->route('users.index');
        $user = UsersDb::findOrFail($id);
        $user->delete();
        return redirect()->route('users_db.index');
    }
}
