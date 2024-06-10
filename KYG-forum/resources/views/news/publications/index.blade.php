<x-app-layout>
    <x-slot name="header">
        <a href="{{route('game.portal.index', $news->portal)}}" class="rounded-full text-sm text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
            Go back to Portal.
        </a>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This is the publications for news
        </h2>
    </x-slot>

    @include('news.publications.partials.create')

    @include('news.publications.partials.edit')
</x-app-layout>