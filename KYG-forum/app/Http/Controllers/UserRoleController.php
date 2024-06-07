<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // public function index()
    // {
    //     return UserRole::all();
    // }
    public function index()
    {
        $userroles = UserRole::get();
        return view('test.userroles.index', ['userroles' => $userroles]);
    }

    // public function create()
    // {
    //     //
    // }
    public function create(UserRole $userroles)
    {
        $users = User::get();
        $roles = Role::get();
        return view('test.userroles.create', ['userroles' => $userroles, 'users' => $users, 'roles' => $roles]);
    }

    // public function store(Request $request)
    // {
    //     $userRole = UserRole::create($request->all());
    //     return response()->json($userRole, 201);
    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required',],
            'role_id' => ['required',],
        ]);
        UserRole::create($validated);
        session()->flash('status', 'UserRole creado!');
        return redirect()->route('test.userroles.index');
    }

    // public function show($id)
    // {
    //     return UserRole::where('username', $id)->get();
    // }
    public function show($user_id)
    {
        $userroles = UserRole::where('user_id',$user_id)->get();
        return view('test.userroles.show', ['userroles' => $userroles]);
    }

    // public function edit($id)
    // {
    //     //
    // }
    public function edit(UserRole $userroles)
    {
        $users = User::get();
        $roles = Role::get();
        return view('test.userroles.edit', ['userroles' => $userroles, 'users' => $users, 'roles' => $roles]);
    }



    // public function update(Request $request, $id)
    // {
    //     // Updating UserRole may involve complex logic
    // }
    public function update(Request $request, UserRole $userroles)
    {
        return "Hola";
        exit();
        $validated = $request->validate([
            'name' => ['required',],
            'email' => ['required',],
            'password' => ['required'],
        ]);
        $userroles->update($validated);
        session()->flash('status', 'Userrole actualizado!');
        return redirect()->route('test.userroles.index');
    }

    public function destroy($id)
    {
        UserRole::where('username', $id)->delete();
        return response()->json(null, 204);
    }
}
