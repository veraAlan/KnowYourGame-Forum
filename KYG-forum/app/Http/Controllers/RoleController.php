<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{


    // Listar roles
    public function index()
    {
        $role = Role::all();
        return view('role.index', compact('role'));
    }


    // Formulario de creación de rol
    public function create(Request $request)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }


        $validated = $request->validate([
            'description' => 'required|min:2|max:25',
        ]);
        Role::create($validated);
        return redirect()->route('role.index')->with(['status' => 'created']);
    }


    // Formulario de edición de rol
    public function edit(Role $roles)
    {
        return view('test.roles.edit', ['roles' => $roles]);
    }


    // Actualizar rol
    public function update(Request $request)
    {
        $validated = $request->validate(['description' => ['required']]);
        Role::find($request->input('role_id'))->update($validated);
        session()->flash('status', 'Role actualizado!');
        return redirect()->route('role.index');
    }


    // Eliminar rol
    public function destroy(Request $request)
    {
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        Role::find($request->input('role_id'))->delete();
        session()->flash('status', 'Role eliminado!');
        return to_route('role.index');
    }
}
