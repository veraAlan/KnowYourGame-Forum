@foreach ($publications as $publication)
    <form method="POST" action="{{ route('news.publications.update', ['news' => $news, 'publication' => $publication]) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <h2 class="font-semibold text-x1 text-gray-800 dark:text-gray-200 leading-tight"></h2>
        <input type="number" value="{{ $news->news_id }}" name="news_id" hidden>
        <input type="number" value="{{ $news->portal_id }}" name="game_id" hidden>
        <input type="text" value="{{ old('title', $publication->title) }}" name="title">
        <input type="textarea" value="{{ old('content', $publication->content) }}" name="content">
        <input type="file" name="img" class="text-black">