<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Form
        </h2>
    </x-slot>

    <form action=" {{ route('test.news.publications.store', $news) }}" method="POST" style="color :white;">
        @csrf
        <input id="idnews" name="idnews" value="{{ $news->idnews }}" hidden>
        <input id="idgame" name="idgame" value="{{ $games->idgame }}" hidden>
        <label for="title">Tittle</label>
        <input type="text" id="title" name="title" style="color: black;">
        <label for="content">Content of the new</label>
        <textarea id="content" name="content" style="color: black;"></textarea>
        <label for="date"> Date of the new</label>
        <input type="date" id="date" name="date" style="color: black;">
        <button type="submit">Enviar</button>
    </form>
</x-app-layout>