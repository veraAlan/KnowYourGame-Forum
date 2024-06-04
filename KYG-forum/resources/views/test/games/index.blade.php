<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of games in our multi portal.
        </h2>
    </x-slot>

    <br>
    <div style="color: white;">
        <h1>The Games Menu</h1><br>
        <a href="{{ route('test.games.create') }}">Create New Game</a>
        {{-- @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif --}}
        {{-- HACE LO MISMO QUE LO COMENTADO DE ARRIBA --}}
        @session('status')
            <div> {{ $value }} </div>
        @endsession


        <br><br>
        @foreach ($games as $game)
            <h2>
                <a href="{{ route('test.games.show', $game) }}">
                    {{ $game->title }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.games.edit', $game) }}">Edit</a>
            <form action="{{ route('test.games.destroy', $game) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach
    </div>



</x-app-layout>
