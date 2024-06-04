<!-- resources/views/test/games/create.blade.php -->
<x-app-layout>

    <form action="{{ route('test.games.store') }}" method="POST" style="color: white;">
        {{-- //TOKEN CSRF TIEMPO DE VIDA 2 HORAS --}}
        @csrf

        {{-- <label for="id">ID:</label>
        <input type="text" id="id" name="id" style="color: black;"><br><br> --}}

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" style="color: black;">
        <button type="submit">Enviar</button>

        @error('title')
            <br>
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror

    </form>


</x-app-layout>
