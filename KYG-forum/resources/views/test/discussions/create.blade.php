<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.discussions.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="id">Id Forum:</label>
        <select id="forum_id" name="forum_id" style="color: black;">
            @if ($forums)
                @foreach ($forums as $forum)
                    <option value="{{ $forum->forum_id }}">{{ $forum->title }} (ID: {{ $forum->forum_id }})</option>
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
        <input type="text" id="title" name="title" style="color: black;"><br><br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" cols="30" rows="1" style="color: black;"></textarea>
        <button type="submit">Enviar</button>
    </form>



</x-app-layout>
