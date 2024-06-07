<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome to the section of news
        </h2>
    </x-slot>

    <div style="color: white;">
        <h1>News</h1>
        <a href="{{ route('test.news.publications.create', $news) }}">Create a New publication</a>
        @session('status')
            <div> {{ $value }}</div>
        @endsession
        <br><br>

        @foreach ($publications as $publication)
            <h2>
                <a href="{{ route('test.news.publications.show', $publication->publication_id) }}">
                    {{ $publication->title }}
                </a>
            </h2> &nbsp;
            <h3>
                {{ $publication->content }}
            </h3>

            <!-- Caller for the image -->
            <img src="{{asset($publication->img)}}" alt="here">

            <a href=" {{ route('test.news.publications.edit', $publication->publication_id) }}">Edit</a>
            <form action=" {{ route('test.news.publications.destroy', ['news' => $news, 'publication' => $publication->publication_id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach
    </div>


</x-app-layout>
