<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            The Discussions
        </h2>
    </x-slot>


    <div style="color: white;">
        <br>
        <a href="{{ route('test.discussions.create') }}">Create New Discussions</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        @foreach ($discussions as $discussion)
            <h2>
                <a href="{{ route('test.discussions.show', $discussion) }}">
                    {{ $discussion->title }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.discussions.edit', $discussion) }}">Edit</a>
            <form action="{{ route('test.discussions.destroy', $discussion) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach
    </div>


</x-app-layout>
