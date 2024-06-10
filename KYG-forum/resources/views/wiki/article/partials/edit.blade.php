<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            @foreach ($articles as $article)
                <div class="py-4 border-b border-gray-200">
                    <form method="POST"
                        action="{{ route('wiki.article.update', $article) }}"
                        class="p-6">
                        @csrf
                        @method('patch')
                        <input type="textarea" value="{{ old('title', $article->title) }}" name="title"
                            class="text-black border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-500">
                        <br><br>
                        <div class="flex items-center gap-4">

                            <x-primary-button>{{ __('Update this Article') }}</x-primary-button>
                            @if (session('idupdated') == $article->article_id)
                                <p id="show-update" x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Updated this Article.') }}</p>
                            @endif
                        </div>
                    </form>
                    <form method="POST"
                        action="{{ route('wiki.article.destroy', $article) }}" class="p-6">
                        @csrf
                        @method('delete')
                        <input type="number" value="{{ $article->article_id }}" name="article_id" hidden>
                        <div class="flex items-center gap-4">
                            <x-danger-button>{{ __('Delete this Article') }}</x-danger-button>
                        </div>
                    </form>
                </div>
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 bg-gray-300 dark:bg-gray-700 py-4 px-6 leading-tight rounded-t-lg">
                    <a href="{{ route('wiki.article.section.index', [$wiki, $article]) }}"
                        class=" text-white flex items-center gap mb-2">
                        {{ __('Go to this article`s Sections') }}
                    </a>
                </h2>
            @endforeach
        </div>
    </div>
</div>
