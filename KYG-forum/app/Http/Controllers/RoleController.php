<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{


    // Listar roles
    public function index()
    {
        $roles = Role::get();
        return view('test.roles.index', ['roles' => $roles]);
    }


    // Formulario de creación de rol
    public function create(Role $roles)
    {
        return view('test.roles.create', ['roles' => $roles]);
    }


    // Guardar nuevo rol
    public function store(Request $request)
    {
        $validated = $request->validate(['description' => ['required']]);
        Role::create($validated);
        session()->flash('status', 'Role creado!');
        return redirect()->route('test.roles.index');
    }


    // Mostrar rol específico
    public function show($id)
    {
        $roles = Role::findOrFail($id);
        return view('test.roles.show', ['roles' => $roles]);
    }


    // Formulario de edición de rol
    public function edit(Role $roles)
    {
        return view('test.roles.edit', ['roles' => $roles]);
    }


    // Actualizar rol
    public function update(Request $request, Role $roles)
    {
        $validated = $request->validate(['description' => ['required']]);
        $roles->update($validated);
        session()->flash('status', 'Role actualizado!');
        return redirect()->route('test.roles.index');
    }


    // Eliminar rol
    public function destroy(Role $roles)
    {
        $roles->delete();
        session()->flash('status', 'Role eliminado!');
        return to_route('test.roles.index');
    }
}
