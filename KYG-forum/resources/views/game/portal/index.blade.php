<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This are the articles inside {{ $games->title }}
        </h2>
    </x-slot>

    @include('game.portal.partials.create');
    @include('game.portal.partials.edit');
</x-app-layout>