<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This is the Games page.
        </h2>
    </x-slot>

    @if (session('status') == 'deleted')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400">{{ __('The wiki was deleted.') }}</p>
    @endif

    @include('game.partials.create')

    @include('game.partials.edit')
</x-app-layout>
