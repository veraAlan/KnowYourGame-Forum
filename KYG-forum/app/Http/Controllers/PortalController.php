<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{


    // Muestra una lista de todos los portales.
    public function index(Game $game)
    {
        $games = Game::find($game->game_id);
        $portals = Portal::all();
        return view('game.portal.index', compact('games', 'portals'));
    }


    public function create(Request $request, Game $game)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'game_id' => 'required',
            'name' => 'required|min:3| max: 25',
            'description' => 'required|min:3| max: 25',
        ]);

        Portal::create($validated);

        return redirect()->route('game.portal.index', $game->game_id)->with('status', 'created');
    }


    public function update(Request $request, Game $games, Portal $portal)
    {

        $validated = $request->validate([
            'name' => 'required|min:3| max: 25',
            'description' => 'required|min:3| max: 25',
        ]);

        Portal::find($portal->portal_id)->update($validated);
        return redirect()->route('game.portal.index', ['game' => $games, '#show-update'])->with(['status' => 'updated', 'idupdated' => $portal->portal_id]);
    }


    public function destroy(Request $request, Game $games, Portal $portal){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        Portal::find($portal->portal_id)->delete();
        return redirect()->route('game.portal.index', $games)->with('status', 'deleted');
    }
    // // Muestra un formulario para crear un nuevo portal, incluyendo una lista de juegos.
    // public function create(Portal $portals)
    // {
    //     $games = Game::get();
    //     return view('test.portals.create', ['portals' => $portals, 'games' => $games]);
    // }


    // // Almacena un nuevo portal en la base de datos después de validar los datos de la solicitud.
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'game_id' => ['required', 'exists:games,game_id'],
    //         'name' => ['required'],
    //         'description' => ['required'],
    //     ]);
    //     Portal::create($validated);
    //     session()->flash('status', '¡Portal creado!');
    //     return redirect()->route('test.portals.index');
    // }


    // // Muestra un portal específico basado en el ID dado.
    // public function show($id)
    // {
    //     $portals = Portal::findOrFail($id);
    //     return view('test.portals.show', ['portals' => $portals]);
    // }


    // // Muestra un formulario para editar un portal existente, incluyendo una lista de juegos.
    // public function edit(Portal $portals)
    // {
    //     $games = Game::all();
    //     return view('test.portals.edit', ['portals' => $portals, 'games' => $games]);
    // }


    // // Actualiza un portal existente en la base de datos después de validar los datos de la solicitud.
    // public function update(Request $request, Portal $portals)
    // {
    //     $validated = $request->validate([
    //         'game_id' => ['required', 'exists:games,game_id'],
    //         'name' => ['required'],
    //         'description' => ['required'],
    //     ]);
    //     $portals->update($validated);
    //     session()->flash('status', '¡Portal actualizado!');
    //     return redirect()->route('test.portals.index');
    // }


    // Elimina un portal específico de la base de datos.
    // public function destroy(Portal $portals)
    // {
    //     $portals->delete();
    //     session()->flash('status', '¡Portal eliminado!');
    //     return to_route('test.portals.index');
    // }
}
