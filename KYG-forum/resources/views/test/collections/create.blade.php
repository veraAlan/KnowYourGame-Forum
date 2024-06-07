<x-app-layout>


    <form action="{{ route('test.collections.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="game_id">game_id:</label>
        <select id="game_id" name="game_id" style="color: black;">
            @if ($games)
                @foreach ($games as $game)
                    <option value="{{ $game->game_id }}">{{ $game->title }} (ID: {{ $game->game_id }})</option>
                @endforeach
            @endif
        </select>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" style="color: black;">
        <button type="submit">Enviar</button>
        @error('category')
            <br>
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </form>


</x-app-layout>
