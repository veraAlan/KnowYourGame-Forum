<!-- views/test/games/index.blade.php -->
<h1>Games</h1>
<ul>
    @foreach ($games as $game)
        <li><a href="{{ route('games.show', ['id' => $game->idgame]) }}">{{ $game->title }}</a></li>
    @endforeach
</ul>
