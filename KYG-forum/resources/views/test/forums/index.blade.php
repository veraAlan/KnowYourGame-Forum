<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            The Games Forum
        </h2>
    </x-slot>


    <div style="color: white;">
        <br>
        <a href="{{ route('test.forums.create') }}">Create New Forum</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        @foreach ($forums as $forum)
            <h2>
                <a href="{{ route('test.forums.show', $forum) }}">
                    {{ $forum->title }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.forums.edit', $forum) }}">Edit</a>
            <form action="{{ route('test.forums.destroy', $forum) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach
    </div>


</x-app-layout>
