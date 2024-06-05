<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Game;

class CollectionController extends Controller
{
    // Crear una nueva colección
    public function create(Collection $collection)
    {
        // Retorna una vista para crear una nueva colección. Obtiene todos los juegos de la base de datos y los pasa a la vista junto con una colección (que puede ser nueva o vacía).
        $game = Game::all();
        return view('test.collections.create', ['collection' => $collection, 'game' => $game]);
    }


    // Mostrar todas las colecciones
    public function index()
    {
        // Obtiene todas las colecciones y juegos de la base de datos y los pasa a la vista.
        $games = Game::all();
        $collections = Collection::get();
        return view('test.collections.index', ['collections' => $collections, 'games' => $games]);
    }


    // Mostrar una colección específica
    public function show($id)
    {
        // Encuentra la colección correspondiente en la base de datos y la pasa a la vista.
        $collections = Collection::findOrFail($id);
        return view('test.collections.show', ['collections' => $collections]);
    }


    // Crear una nueva colección
    public function store(Request $request)
    {
        // Valida los datos recibidos del formulario, crea una nueva colección y la guarda en la base de datos.
        $validated = $request->validate([
            'idgame' => ['required', 'exists:games,idgame'],
            'category' => ['required']
        ]);
        Collection::create($validated);
        session()->flash('status', 'Collection Created!');
        return redirect()->route('test.collections.index');
    }


    // Editar una colección existente
    public function edit(Collection $collection)
    {
        // Retorna una vista para editar una colección existente. Obtiene todos los juegos de la base de datos y los pasa a la vista junto con la colección que se va a editar.
        $game = Game::all();
        return view('test.collections.edit', ['collection' => $collection, 'game' => $game]);
    }


    // Actualizar una colección existente
    public function update(Request $request, Collection $collection)
    {
        // Valida los datos recibidos del formulario, actualiza la colección correspondiente en la base de datos y redirige a la página de índice de colecciones.
        $validated = $request->validate([
            'idgame' => 'required',
            'category' => 'required',
        ]);
        $collection->update($validated);
        session()->flash('status', 'Collections Update!');
        return redirect()->route('test.collections.index');
    }


    // Eliminar una colección
    public function destroy(Collection $collection)
    {
        // Elimina la colección especificada de la base de datos y redirige a la página de índice de colecciones.
        $collection->delete();
        session()->flash('status', 'Game Deleted!');
        return to_route('test.collections.index');
    }
}