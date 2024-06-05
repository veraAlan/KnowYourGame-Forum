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
            <label for="idcollections">ID Category:</label>
            <input name="idcollections" value="{{ $collections->idcollection }}" style="color: black;" readonly>
        </div>
        <select id="idgame" name="idgame" style="color: black;">
            @if ($games)
                @foreach ($games as $game)
                    <option value="{{ $game->idgame }}">{{ $game->title }} (ID: {{ $game->idgame }})</option>
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
