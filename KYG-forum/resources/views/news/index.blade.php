<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 dark:text-gray-200 leading-tight">
            This is the News page.
        </h2>
    </x-slot>

    <!-- News deleted toast -->
    @if(session('status') == 'deleted')
        <p 
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
        >{{ __('the news was deleted.') }}</p>
    @endif

    @include('news.partials.create')

    @include('news.partials.edit')

</x-app-layout>