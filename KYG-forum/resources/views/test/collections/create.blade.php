<x-app-layout>


    <form action="{{ route('test.collections.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="idgame">IdGame:</label>
        <select id="idgame" name="idgame" style="color: black;">
            @if ($game)
                @foreach ($game as $game)
                    <option value="{{ $game->idgame }}">{{ $game->title }} (ID: {{ $game->idgame }})</option>
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
