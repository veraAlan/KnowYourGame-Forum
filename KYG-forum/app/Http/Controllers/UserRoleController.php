<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        return UserRole::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $userRole = UserRole::create($request->all());
        return response()->json($userRole, 201);
    }

    static public function show($id)
    {
        return UserRole::where('user_id', $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Updating UserRole may involve complex logic
    }

    public function destroy($id)
    {
        UserRole::where('username', $id)->delete();
        return response()->json(null, 204);
    }
}