<!-- resources/views/test/games/menu.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>



    <form action="{{ route('test.games.update', $game) }}" method="POST" style="color: white;">
        {{-- //TOKEN CSRF TIEMPO DE VIDA 2 HORAS --}}
        @csrf
        {{-- LARAVEL - EMULAR ESTE TIPO DE PETICIONES --}}
        @method('PATCH')

        {{-- <label for="id">ID:</label>
        <input type="text" id="id" name="id" style="color: black;"><br><br> --}}

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" style="color: black;" value="{{ old('title', $game->title) }}">
        <button type="submit">Enviar</button>

        @error('title')
            <br>
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror

    </form>
</x-app-layout>
