<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This is the Sections page for {{ $forum->title }}.
        </h2>
    </x-slot>

    

    @include('game.portal.forum.partials.edit')

</x-app-layout>
