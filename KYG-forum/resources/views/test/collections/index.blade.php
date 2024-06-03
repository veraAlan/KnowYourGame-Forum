<!-- resources/views/test/collections/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Colecciones</title>
</head>
<body>
    <h1>Listar Colecciones</h1>
    <ul>
        @foreach ($collections as $collection)
            <li>{{ $collection->id }} - {{ $collection->category }}</li>
        @endforeach
    </ul>
</body>
</html>
