<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.portals.update', ['portals' => $portals]) }}" method="POST" style="color: white;">
        @csrf
        @method('PATCH')
        <div>
            <label for="portal_id">ID Category:</label>
            <input name="portal_id" value="{{ $portals->portal_id }}" style="color: black;" readonly>
        </div>
        <label for="game_id">Id Game:</label><br>
        <select id="game_id" name="game_id" style="color: black;">
            @if ($games)
                @foreach ($games as $game)
                    <option value="{{ $game->game_id }}"
                        {{ old('game_id', $portals['game_id']) == $game->game_id ? 'selected' : '' }}>
                        {{ $game->title }} (ID: {{ $game->game_id }})
                    </option>
                @endforeach
            @endif
        </select><br><br>
        <label for="name">Portal Name:</label><br>
        <input type="text" id="name" name="name" style="color: black;"
            value="{{ old('name', $portals['name']) }}"><br><br>
        <label for="description">Description:</label><br>
        <input id="description" name="description" style="color: black;"
            value="{{ old('description', $portals['description']) }}"></input><br><br>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
