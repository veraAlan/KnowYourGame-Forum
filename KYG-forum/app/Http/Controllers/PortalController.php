<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{


    // Muestra una lista de todos los portales.
    public function index()
    {
        $portals = Portal::get();
        return view('test.portals.index', ['portals' => $portals]);
    }


    // Muestra un formulario para crear un nuevo portal, incluyendo una lista de juegos.
    public function create(Portal $portals)
    {
        $games = Game::get();
        return view('test.portals.create', ['portals' => $portals, 'games' => $games]);
    }


    // Almacena un nuevo portal en la base de datos después de validar los datos de la solicitud.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idgame' => ['required', 'exists:games,idgame'],
            'name' => ['required'],
            'description' => ['required'],
        ]);
        Portal::create($validated);
        session()->flash('status', '¡Portal creado!');
        return redirect()->route('test.portals.index');
    }


    // Muestra un portal específico basado en el ID dado.
    public function show($id)
    {
        $portals = Portal::findOrFail($id);
        return view('test.portals.show', ['portals' => $portals]);
    }


    // Muestra un formulario para editar un portal existente, incluyendo una lista de juegos.
    public function edit(Portal $portals)
    {
        $games = Game::all();
        return view('test.portals.edit', ['portals' => $portals, 'games' => $games]);
    }


    // Actualiza un portal existente en la base de datos después de validar los datos de la solicitud.
    public function update(Request $request, Portal $portals)
    {
        $validated = $request->validate([
            'idgame' => ['required', 'exists:games,idgame'],
            'name' => ['required'],
            'description' => ['required'],
        ]);
        $portals->update($validated);
        session()->flash('status', '¡Portal actualizado!');
        return redirect()->route('test.portals.index');
    }


    // Elimina un portal específico de la base de datos.
    public function destroy(Portal $portals)
    {
        $portals->delete();
        session()->flash('status', '¡Portal eliminado!');
        return to_route('test.portals.index');
    }
}