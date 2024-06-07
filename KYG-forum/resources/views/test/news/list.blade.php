<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This is the Wikis page.
        </h2>
    </x-slot>
        <a href="/news/create">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2 border rounded-xl w-64">
                Create a new page of News.
            </h2>
        </a>

        @foreach($news as $new)
        <h2>
            
        </h2>
</x-app-layout>