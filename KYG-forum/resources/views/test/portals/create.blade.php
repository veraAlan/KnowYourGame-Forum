<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Form
        </h2>
    </x-slot>


    <form action="{{ route('test.portals.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="idgame">Id Game:</label><br>
        <select id="idgame" name="idgame" style="color: black;">
            @if ($games)
                @foreach ($games as $game)
                    <option value="{{ $game->idgame }}">{{ $game->title }} (ID: {{ $game->idgame }})</option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="name">Portal Name:</label><br>
        <input type="text" id="name" name="name" style="color: black;"><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" style="color: black;"></textarea><br><br>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
