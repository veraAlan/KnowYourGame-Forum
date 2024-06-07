<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of games in our multi portal.
        </h2>
    </x-slot>


    @foreach ($userroles as $userrole)
        <div style="color: white;">
            <h1>{{ $userrole->user_id }} (ID : {{ $userrole->idrole }})</h1>
        </div>
    @endforeach


</x-app-layout>
