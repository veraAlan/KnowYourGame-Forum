<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.replies.update', ['replies' => $replies]) }}" method="POST" style="color: white;">
        @csrf
        @method('PATCH')
        <div>
            <label for="idreply">ID Reply:</label>
            <input name="idreply" value="{{ $replies->idreply }}" style="color: black;" readonly>
        </div><br>
        <label for="id">Id Discussion:</label>
        <select id="iddiscussion" name="iddiscussion" style="color: black;">
            @if ($discussions)
                @foreach ($discussions as $discussion)
                    <option value="{{ $discussion->iddiscussion }}"
                        {{ old('iddiscussion', $replies['iddiscussion']) == $discussion->iddiscussion ? 'selected' : '' }}>
                        {{ $discussion->title }} (ID: {{ $discussion->iddiscussion }})</option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="user_id">Id User:</label>
        <select id="user_id" name="user_id" style="color: black;">
            @if ($users)
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id', $replies['user_id']) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} (ID: {{ $user->id }})</option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" style="color: black;"
            value="{{ old('date', $replies['date']) }}"><br><br>
        <label for="title">Title:</label>
        <textarea name="content" id="content" cols="30" rows="1" style="color: black;">{{ old('content', $replies['content']) }}</textarea>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
