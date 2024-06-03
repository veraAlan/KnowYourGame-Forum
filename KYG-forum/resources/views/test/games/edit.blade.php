<!-- views/test/games/edit.blade.php -->


@section('content')
    <h1>Edit Game - {{ $game->title }}</h1>
    <form action="{{ route('games.update', ['id' => $game->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $game->title }}"><br><br>
        <input type="submit" value="Submit">
    </form>
    <p><a href="{{ route('games.index') }}">Back to Games</a></p>
@endsection
