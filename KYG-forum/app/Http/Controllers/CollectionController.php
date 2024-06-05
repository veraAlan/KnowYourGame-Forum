<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Collection;
use App\Models\Game;

class CollectionController extends Controller
{
    // Mostrar todas las colecciones
    // public function index(Collection $collection)
    // {
    //     return response()->json($collection->all(), 200);
    // }
    ////COLLECTIONS PRUEBA FORMULARIOS
    ////COLLECTIONS PRUEBA FORMULARIOS
    ////COLLECTIONS PRUEBA FORMULARIOS
    public function index()
    {
        $games = Game::all();
        $collections = Collection::get();
        return view('test.collections.index', ['collections' => $collections, 'games' => $games]);
    }

    ////COLLECTIONS PRUEBA FORMULARIOS
    ////COLLECTIONS PRUEBA FORMULARIOS
    ////COLLECTIONS PRUEBA FORMULARIOS
    public function create(Request $request)
    {
        $collections = $request->collections;
        $games = $request->games;

        return view('test.collections.create', compact('collections', 'games'));
    }


    // Mostrar una colección específica
    // public function show($id, Collection $collection)
    // {
    //     $resource = $collection->find($id);

    //     if (!$resource) {
    //         return response()->json(['message' => 'Colección no encontrada'], 404);
    //     }

    //     return response()->json($resource, 200);
    // }
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function show($id)
    {
        $collections = Collection::findOrFail($id);
        return view('test.collections.show', ['collections' => $collections]);
    }

    // // Crear una nueva colección
    // public function store(Request $request, Collection $collection)
    // {
    //     $validatedData = $request->validate([
    //         'idgame' => 'required|integer|exists:games,idgame',
    //         'category' => 'required|string|max:255',
    //     ]);

    //     $newCollection = $collection->create($validatedData);
    //     return response()->json($newCollection, 201);
    // }
    ////COLLECTIONS PRUEBA FORMULARIOS
    ////COLLECTIONS PRUEBA FORMULARIOS
    ////COLLECTIONS PRUEBA FORMULARIOS
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idgame' => ['required', 'exists:games,idgame'],
            'category' => ['required']
        ]);

        Collection::create($validated);

        session()->flash('status', 'Collection Created!');

        return redirect()->route('test.collections.index');
    }

    // Actualizar una colección existente
    public function update(Request $request, $id, Collection $collection)
    {
        $resource = $collection->find($id);

        if (!$resource) {
            return response()->json(['message' => 'Colección no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'idgame' => 'required|integer|exists:games,idgame',
            'category' => 'required|string|max:255',
        ]);

        $resource->update($validatedData);
        return response()->json($resource, 200);
    }

    // Eliminar una colección
    public function destroy($id, Collection $collection)
    {
        $resource = $collection->find($id);

        if (!$resource) {
            return response()->json(['message' => 'Colección no encontrada'], 404);
        }

        $resource->delete();
        return response()->json(null, 204);
    }
}
