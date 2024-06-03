<!-- views/test/games/show.blade.php -->


@section('content')
    <h1>{{ $game->title }}</h1>
    <p>ID: {{ $game->id }}</p>
    <p><a href="{{ route('games.index') }}">Back to Games</a></p>
@endsection
