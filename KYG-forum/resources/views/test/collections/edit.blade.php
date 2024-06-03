<!-- resources/views/test/collections/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Colección</title>
</head>
<body>
    <h1>Editar Colección</h1>
    <form action="{{ route('collections.update', ['collection' => $collection->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="idgame">ID del Juego:</label>
        <input type="text" id="idgame" name="idgame" value="{{ $collection->idgame }}"><br><br>
        <label for="category">Categoría:</label>
        <input type="text" id="category" name="category" value="{{ $collection->category }}"><br><br>
        <button type="submit">Actualizar Colección</button>
    </form>
</body>
</html>
