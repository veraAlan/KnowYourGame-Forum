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
            <label for="iddiscussion">ID Category:</label>
            <input name="iddiscussion" value="{{ $discussions->iddiscussion }}" style="color: black;" readonly>
        </div><br>
        <label for="id">Id Forum:</label>
        <select id="idforum" name="idforum" style="color: black;">
            @if ($forums)
                @foreach ($forums as $forum)
                    <option value="{{ $forum->idforum }}"
                        {{ old('idforum', $discussions['idforum']) == $forum->idforum ? 'selected' : '' }}>
                        {{ $forum->title }} (ID: {{ $forum->idforum }})
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
