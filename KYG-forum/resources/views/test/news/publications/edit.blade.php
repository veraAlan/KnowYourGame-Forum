<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 dark:text-gray-200 leading-tight">
            Edit form
        </h2>
    </x-slot>

    <form action="{{ route('test.news.publications.update', $publications) }}" method="POST" style="color: white;">
    @csrf
    @method('PATCH')
    <input name="publication_id" value="{{ old('publication_id', $publications->publication_ids)}}" hidden>
    <input name="news_ids" value="{{ old('news_ids', $publications->news_ids)}}" hidden>
    <input name="game_id" vañie="{{ old('game_id', $publications->game_id)}}" hidden>
    <label for="title">Tittle</label>
    <input type="text" id="title" name="title" style="color: black;" value="{{ old('title', $publications->title) }}">
    <label for="content">Content of the new</label>
    <textarea id="content" name="content" style="color: black;">{{ old('content', $publications->content) }}</textarea>
    <label for="date"> Date of the new</label>
    <input type="date" id="date" name="date"  style="color: black;" value="{{ old('date', $publications->date) }}">
    <button type="submit">Enviar</button>
    @error('tittle', 'content', 'date')
    <br>
    <small style="color: red">{{ $message }}</small>
    <br>
    @enderror
</form>



</x-app-layout>