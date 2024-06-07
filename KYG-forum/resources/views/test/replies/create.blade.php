<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.replies.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="id">Id Discussion:</label>
        <select id="discussion_id" name="discussion_id" style="color: black;">
            @if ($discussions)
                @foreach ($discussions as $discussion)
                    <option value="{{ $discussion->discussion_id }}">{{ $discussion->title }} (ID:
                        {{ $discussion->discussion_id }})</option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="user_id">Id User:</label>
        <select id="user_id" name="user_id" style="color: black;">
            @if ($users)
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" style="color: black;"><br><br>
        <label for="title">Title:</label>
        <textarea name="content" id="content" cols="30" rows="1" style="color: black;"></textarea>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
