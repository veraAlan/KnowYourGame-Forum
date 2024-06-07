<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            The Userroles
        </h2>
    </x-slot>


    <div style="color: white;">
        <br>
        <a href="{{ route('test.userroles.create') }}">Create New Userrole</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        
        @foreach ($userroles as $userrole)
            <h2>
                <a href="{{ route('test.userroles.show', $userrole->user_id) }}">
                    {{ $userrole->user_id }} (ID : {{ $userrole->idrole }})
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.userroles.edit', $userrole->user_id) }}">Edit</a>
        @endforeach
    </div>


</x-app-layout>
