<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.collections.update', $collections) }}" method="POST" style="color: white;">
        @csrf
        @method('PATCH')
        <div>
            <label for="tag_ids">ID Category:</label>
            <input name="tag_ids" value="{{ $collections->tag_id }}" style="color: black;" readonly>
        </div>
        <select id="game_id" name="game_id" style="color: black;">
            @if ($games)
                @foreach ($games as $game)
                    <option value="{{ $game->game_id }}">{{ $game->title }} (ID: {{ $game->game_id }})</option>
                @endforeach
            @endif
        </select>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" style="color: black;"
            value="{{ old('category', $collections['category']) }}">
        <button type="submit">Enviar</button>
        @error('category')
            <br>
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </form>


</x-app-layout>
