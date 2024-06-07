<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Form
        </h2>
    </x-slot>

    <form action=" {{ route('test.news.publications.store', $news) }}" method="POST" style="color :white;" enctype="multipart/form-data">
        @csrf
        <input id="news_id" name="news_id" value="{{ $news->news_id }}" hidden>
        <input id="news_id" name="news_id" value="{{ $news->news_id }}" hidden>
        <input id="game_id" name="game_id" value="{{ $games->game_id }}" hidden>
        <label for="title">Tittle</label>
        <input type="text" id="title" name="title" style="color: black;" value="Titulo">
        <label for="content">Content of the new</label>
        <input type="textarea" id="content" name="content" style="color: black;" value="Area"></textarea>
        <label for="date"> Date of the new</label>
        <input type="date" id="date" name="date" style="color: black;" value="{{date('d-m-Y')}}">
        <label for="img">Insertar imagen</label>
        <input type="file" id="img" name="img"> 
        <button type="submit">Enviar</button>
    </form>

</x-app-layout>