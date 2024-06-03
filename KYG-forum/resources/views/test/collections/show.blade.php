<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Colección</title>
</head>
<body>
    <h1>Buscar Colección</h1>
    <form method="GET" action="/test/collections/show">
        @csrf
        <label for="collection_id">ID de Colección:</label><br>
        <input type="text" id="collection_id" name="id"><br><br>
        <button type="submit">Buscar</button>
    </form>

    @if(isset($error))
        <h2>{{ $error }}</h2>
    @elseif(isset($collection))
        <h2>Detalles de la Colección</h2>
        <p>ID: {{ $collection->id }}</p>
        <!-- Mostrar otros detalles de la colección según tu estructura de datos -->
    @endif
</body>
</html>
