<!-- views/test/games/create.blade.php -->
<h1>Create Game</h1>
<form action="{{ route('games.store') }}" method="post">
    @csrf
    <div>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}"><br>
        @error('title')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <br>
    <button type="submit">Create</button>
</form>
