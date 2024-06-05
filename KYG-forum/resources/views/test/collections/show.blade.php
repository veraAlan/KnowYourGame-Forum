<!-- resources/views/test/games/menu.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of collections in our multi portal.
        </h2>
    </x-slot>
    <br>
    <div style="color: white;">
        <h1>{{ $collections->category }}</h1>
    </div>



</x-app-layout>
