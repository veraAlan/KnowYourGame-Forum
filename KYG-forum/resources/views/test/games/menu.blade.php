<!-- resources/views/test/games/menu.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of games in our multi portal.
        </h2>
    </x-slot>

    <br>
    <div style="color: white;">
        <h1>The Games Menu</h1>
        @foreach ($games as $game)
            <h2>{{ $game->title }}</h2>
        @endforeach
    </div>



</x-app-layout>
