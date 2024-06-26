<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrator authenticated') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're in the admin page!") }}
                </div>
            </div>
        </div>
    </div>


    <a href="/adm/game" class="flex items-center gap-4 text-white">
        {{ __('Go to admin page for Game.') }}
    </a>
</x-app-layout>