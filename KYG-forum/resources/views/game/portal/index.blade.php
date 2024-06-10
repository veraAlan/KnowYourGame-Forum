<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This are the portals inside {{ $games->title }}
        </h2>
    </x-slot>
    @if (!$wiki->isEmpty() && !$new->isEmpty() && !$forum->isEmpty())
    @include('game.portal.partials.edit', [
        'wiki' => $wiki[0] ?? null,
        'new' => $new[0] ?? null,
        'forum' => $forum[0] ?? null,
        'portal' => $portal,
    ])
    @else

                @include('wiki.partials.create')

                @include('news.partials.create')
        
                @include('game.portal.forum.partials.create')
    @endif

</x-app-layout>
