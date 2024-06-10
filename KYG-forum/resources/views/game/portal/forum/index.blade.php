<x-app-layout>
    <x-slot name="header">
        <a href="{{route('game.portal.index', $portal->game)}}" class="rounded-full text-sm text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
            Go back to {{$portal->name}}
        </a>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This is the Sections page for {{ $forum->title }}.
        </h2>
    </x-slot>

    @include('game.portal.forum.discussion.partials.create')

    @include('game.portal.forum.partials.edit')

</x-app-layout>
