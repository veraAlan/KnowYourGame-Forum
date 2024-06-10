<x-app-layout>
    <x-slot name="header">
        <a href="{{route('game.portal.forum.index', $forum)}}" class="rounded-full text-sm text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
            Go back to {{$forum->title}}
        </a>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Estas en una discussion de {{ $forum->title }}.
        </h2>
    </x-slot>



    @include('game.portal.forum.discussion.partials.edit')

    @include('game.portal.forum.discussion.reply.index')

</x-app-layout>
