<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Estas en una discussion de {{ $forum->title }}.
        </h2>
    </x-slot>


    @include('game.portal.forum.discussion.partials.create')

    @include('game.portal.forum.discussion.partials.edit')

</x-app-layout>
