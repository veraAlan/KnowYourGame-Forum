<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Portal;
use Illuminate\Http\Request;

class ForumController extends Controller
{


    // Muestra una lista de todos los foros
    public function index()
    {
        $forums = Forum::get();
        return view('test.forums.index', ['forums' => $forums]);
    }


    // Muestra el formulario para crear un nuevo foro
    public function create(Forum $forums)
    {
        $portals = Portal::get();
        return view('test.forums.create', ['forums' => $forums, 'portals' => $portals]);
    }


    // Almacena un nuevo foro en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idportal' => ['required', 'exists:portals,idportal'],
            'title' => ['required'],
            'img' => ['required'],
        ]);
        Forum::create($validated);
        session()->flash('status', '¡Foro creado!');
        return redirect()->route('test.forums.index');
    }


    // Muestra un foro específico basado en su ID
    public function show($id)
    {
        $forums = Forum::findOrFail($id);
        return view('test.forums.show', ['forums' => $forums]);
    }


    // Muestra el formulario para editar un foro existente
    public function edit(Forum $forums)
    {
        $portals = Portal::all();
        return view('test.forums.edit', ['forums' => $forums, 'portals' => $portals]);
    }


    // Actualiza un foro existente en la base de datos
    public function update(Request $request, Forum $forums)
    {
        $validated = $request->validate([
            'idportal' => ['required', 'exists:portals,idportal'],
            'title' => ['required'],
            'img' => ['required'],
        ]);
        $forums->update($validated);
        session()->flash('status', '¡Foro actualizado!');
        return redirect()->route('test.forums.index');
    }


    // Elimina un foro de la base de datos
    public function destroy(Forum $forums)
    {
        $forums->delete();
        session()->flash('status', '¡Foro eliminado!');
        return to_route('test.forums.index');
    }
}
