<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($publications as $publication)
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
                <div class="relative">
                    <img src="{{ asset($publication->img) }}" alt="{{ $publication->title }}" class="w-full h-40 object-cover sm:rounded-t-lg">
                </div>
                <div class="p-4">
                    <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1">{{ $publication->title }}</h2>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">{{ $publication->content }}</p>
                    <form method="POST" action="{{ route('news.publications.update', ['news' => $news, 'publication' => $publication]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="number" value="{{ $news->news_id }}" name="news_id" hidden>
                        <input type="number" value="{{ $news->portal_id }}" name="game_id" hidden>
                        <input type="text" value="{{ old('title', $publication->title) }}" name="title" class="text-black border border-gray-300 rounded-md p-1 mb-1 w-full text-sm">
                        <br><br>
                        <textarea name="content" class="text-black border border-gray-300 rounded-md p-1 mb-1 w-full text-sm" rows="2">{{ old('content', $publication->content) }}</textarea>
                        <br><br>
                        <input type="file" name="img" class="text-black border border-gray-300 rounded-md p-1 mb-1 w-full text-sm">
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs">{{ __('Update') }}</button>
                        </div>
                        @if(session('idupdated') == $publication->publication_id)
                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ __('Updated this Publication') }}</p>
                        @endif
                    </form>
                    <form method="POST" action="{{ route('news.publication.destroy', ['news' => $news, 'publication' => $publication]) }}">
                        @csrf
                        @method('delete')
                        <input type="number" value="{{ $publication->publication_id }}" name="publication_id" hidden>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs">{{ __('Delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

