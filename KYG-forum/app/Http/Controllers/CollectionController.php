<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Collection;

class CollectionController extends Controller
{
    // Mostrar todas las colecciones
    public function index(Collection $collection)
    {
        return response()->json($collection->all(), 200);
    }

    // Mostrar una colección específica
    public function show($id, Collection $collection)
    {
        $resource = $collection->find($id);

        if (!$resource) {
            return response()->json(['message' => 'Colección no encontrada'], 404);
        }

        return response()->json($resource, 200);
    }

    // Crear una nueva colección
    public function store(Request $request, Collection $collection)
    {
        $validatedData = $request->validate([
            'idgame' => 'required|integer|exists:games,idgame',
            'category' => 'required|string|max:255',
        ]);

        $newCollection = $collection->create($validatedData);
        return response()->json($newCollection, 201);
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
