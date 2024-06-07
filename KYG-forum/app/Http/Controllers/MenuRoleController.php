<?php

namespace App\Http\Controllers;

use App\Models\MenuRole;
use Illuminate\Http\Request;

class MenuRoleController extends Controller
{
    public function index()
    {
        return MenuRole::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $menuRole = MenuRole::create($request->all());
        return response()->json($menuRole, 201);
    }

    public function show($id)
    {
        return MenuRole::where('menu_id', $id)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Updating MenuRole may involve complex logic
    }

    public function destroy($id)
    {
        MenuRole::where('menu_id', $id)->delete();
        return response()->json(null, 204);
    }
}