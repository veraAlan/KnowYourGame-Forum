@foreach ($news as $new)
    <form method="POST" action="{{ route('wiki.update') }}">
        @csrf
        @method('patch')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
        <input type="number" value="{{ $new->news_id }}" name="news_id" hidden>
        <a href="{{ route('news.publications.index', $new) }}" class="flex items-center gap-4 text-white">
            {{ __('Go to publications.') }}
        </a>
        <h1 class="flex items-center gap-4 text-white">{{ $new->title}}</h1>
    </form>
    <br>
@endforeach
