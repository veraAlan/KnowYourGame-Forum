<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.discussions.update', ['discussions' => $discussions]) }}" method="POST"
        style="color: white;">
        @csrf
        @method('PATCH')
        <div>
            <label for="discussion_id">ID Category:</label>
            <input name="discussion_id" value="{{ $discussions->discussion_id }}" style="color: black;" readonly>
        </div><br>
        <label for="id">Id Forum:</label>
        <select id="forum_id" name="forum_id" style="color: black;">
            @if ($forums)
                @foreach ($forums as $forum)
                    <option value="{{ $forum->forum_id }}"
                        {{ old('forum_id', $discussions['forum_id']) == $forum->forum_id ? 'selected' : '' }}>
                        {{ $forum->title }} (ID: {{ $forum->forum_id }})
                    </option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="user_id">Id User:</label>
        <select id="user_id" name="user_id" style="color: black;">
            @if ($users)
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id', $discussions['user_id']) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} (ID: {{ $user->id }})
                    </option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" style="color: black;"
            value="{{ old('date', $discussions['date']) }}"><br><br>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" style="color: black;"
            value="{{ old('title', $discussions['title']) }}"><br><br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" cols="30" rows="1" style="color: black;">{{ old('content', $discussions['content']) }}</textarea>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
