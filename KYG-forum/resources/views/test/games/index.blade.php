<!-- resources/views/test/games/menu.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of games in our multi portal.
        </h2>
    </x-slot>

    <br>
    <div style="color: white;">
        <h1>The Games Menu</h1><br>
        @foreach ($games as $game)
        <h2>
            <a href="{{ route('test.games.show', $game)}}">{{ $game->title }}</a>
        </h2>
        @endforeach
    </div>



</x-app-layout>
