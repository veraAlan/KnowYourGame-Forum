<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        $role = Role::all();
        $userrole = UserRole::all();
        // Verifica si se ha enviado algún parámetro llamado 'cambiar_permisos'
        if ($request->has('cambiar_permisos')) {
            return view('role.permisos.index', compact('userrole', 'user', 'role'));
        } else {
            return view('role.index', compact('userrole', 'user', 'role'));
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required'],
            'role_id' => ['required'],
        ]);
        $userRole = UserRole::where('user_id', $validated['user_id'])->first();
        if ($userRole && $userRole->role_id != $validated['role_id']) {
            $userRole->update(['role_id' => $validated['role_id']]);
            session()->flash('status', 'Userrole actualizado!');
        } else {
            session()->flash('status', 'El usuario ya tiene este rol.');
        }
    
        return redirect()->route('role.index');
    }
}
