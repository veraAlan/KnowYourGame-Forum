<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome to the section of news
        </h2>
    </x-slot>


    <div style="color: white;">
        <br>
        <a href="{{ route('test.roles.create') }}">Create New Role</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        @foreach ($roles as $role)
            <h2>
                <a href="{{ route('test.roles.show', $role) }}">
                    {{ $role->description }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.roles.edit', $role) }}">Edit</a>
            <form action="{{ route('test.roles.destroy', $role) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach


</x-app-layout>
