<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This is the publications for news
        </h2>
    </x-slot>

    @include('news.publications.partials.create')

    @include('news.publications.partials.edit')
</x-app-layout>