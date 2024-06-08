<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            The Replies
        </h2>
    </x-slot>


    <div style="color: white;">
        <br>
        <a href="{{ route('test.replies.create') }}">Create New Replies</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        @foreach ($replies as $reply)
            <h2>
                <a href="{{ route('test.replies.show', $reply) }}">
                    {{ $reply->content }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.replies.edit', $reply) }}">Edit</a>
            <form action="{{ route('test.replies.destroy', $reply) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach


</x-app-layout>
