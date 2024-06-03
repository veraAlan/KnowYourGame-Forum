<!-- resources/views/test/collections/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Colección</title>
</head>
<body>
    <h1>Crear Nueva Colección</h1>
    <!-- Formulario para crear una nueva colección -->
    <form action="/test/collections" method="POST">
        @csrf
        <label for="idgame">ID del juego:</label><br>
        <input type="number" id="idgame" name="idgame" required><br>
        <label for="category">Categoría:</label><br>
        <input type="text" id="category" name="category" required maxlength="255"><br><br>
        <button type="submit">Crear Colección</button>
    </form>
</body>
</html>