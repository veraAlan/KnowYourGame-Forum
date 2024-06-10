<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This are the portals inside {{ $games->title }}
        </h2>
    </x-slot>
    @include('game.portal.partials.create')
    @include('wiki.partials.create')
    @include('news.partials.create')
    @include('game.portal.partials.edit', ['wiki' => $wiki, 'new' => $new, 'forum' => $forum, 'portal' => $portal]);
</x-app-layout>
