<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            The Users
        </h2>
    </x-slot>


    <div style="color: white;">
        <br>
        <a href="{{ route('test.users.create') }}">Create New User</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        @foreach ($users as $user)
            <h2>
                <a href="{{ route('test.users.show', $user) }}">
                    {{ $user->name }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.users.edit', $user) }}">Edit</a>
            <form action="{{ route('test.users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach
    </div>


</x-app-layout>
