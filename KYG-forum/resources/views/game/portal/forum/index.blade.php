<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This is the Sections page for {{ $portal->name }}.
        </h2>
    </x-slot>

    @include('game.portal.forum.discussion.partials.create', [
        'game' => $game,
        'portal' => $portal,
        'forum' => $forums,
        'discussion' => $discussions,
    ])
</x-app-layout>
