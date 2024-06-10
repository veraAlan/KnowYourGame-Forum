<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-white dark:bg-gray-800 sm:rounded-lg p-6">
            
            <!-- Wiki Form -->
            <div class="m-4 bg-gray-800 p-4 rounded-lg flex flex-col justify-between">
                <h2 class="text-white text-center mb-4">Wiki</h2>
                <form method="POST" action="{{ route('wiki.update') }}" class="space-y-4">
                    @csrf
                    @method('patch')
                    <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
                    <label class="block text-white">{{ __('Title') }}</label>
                    <input type="textarea" value="{{ old('title', $wiki->title) }}" name="title" class="w-full rounded-md bg-gray-800 text-white border border-gray-300 p-2 focus:outline-none focus:ring focus:border-blue-500">
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-full text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                            {{ __('Update this Wiki') }}
                        </button>
                        @if (session('idupdated') == $wiki->wiki_id)
                            <p class="text-sm text-gray-400 ml-4">{{ __('Updated this Wiki.') }}</p>
                        @endif
                    </div>
                </form>
                <form method="POST" action="{{ route('wiki.destroy') }}" class="mt-4">
                    @csrf
                    @method('delete')
                    <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-full text-white bg-red-600 hover:bg-red-700 px-4 py-2">
                            {{ __('Delete this Wiki') }}
                        </button>
                    </div>
                </form>
                <a href="{{ route('wiki.article.index', $wiki) }}" class="flex items-center justify-center text-white mt-4">
                    {{ __('Go to this Wiki') }}
                </a>
            </div>

            <!-- News Form -->
            <div class="m-4 bg-gray-800 p-4 rounded-lg flex flex-col justify-between">
                <h2 class="text-white text-center mb-4">News</h2>
                <form method="POST" action="{{ route('news.update') }}" class="space-y-4">
                    @csrf
                    @method('patch')
                    <input type="number" value="{{ $new->news_id }}" name="news_id" hidden>
                    <label class="block text-white">{{ __('Title') }}</label>
                    <input type="textarea" value="{{ old('title', $new->title) }}" name="title" class="w-full rounded-md bg-gray-800 text-white border border-gray-300 p-2 focus:outline-none focus:ring focus:border-blue-500">
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-full text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                            {{ __('Update this News') }}
                        </button>
                        @if (session('idupdated') == $new->news_id)
                            <p class="text-sm text-gray-400 ml-4">{{ __('Updated this News.') }}</p>
                        @endif
                    </div>
                </form>
                <form method="POST" action="{{ route('news.destroy') }}" class="mt-4">
                    @csrf
                    @method('delete')
                    <input type="number" value="{{ $new->news_id }}" name="news_id" hidden>
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-full text-white bg-red-600 hover:bg-red-700 px-4 py-2">
                            {{ __('Delete this News') }}
                        </button>
                    </div>
                </form>
                <a href="{{ route('news.publications.index', $new) }}" class="flex items-center justify-center text-white mt-4">
                    {{ __('Go to this News') }}
                </a>
            </div>

            <!-- Forum Form -->
            <div class="m-4 bg-gray-800 p-4 rounded-lg flex flex-col justify-between">
                <h2 class="text-white text-center mb-4">Forum</h2>
                <form method="POST" action="{{ route('game.portal.forum.update', ['portal' => $portal, 'forum' => $forum]) }}" class="space-y-4">
                    @csrf
                    @method('patch')
                    <input type="number" value="{{ $forum->forum_id }}" name="forum_id" hidden>
                    <label class="block text-white">{{ __('Title') }}</label>
                    <input type="textarea" value="{{ old('title', $forum->title) }}" name="title" class="w-full rounded-md bg-gray-800 text-white border border-gray-300 p-2 focus:outline-none focus:ring focus:border-blue-500">
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-full text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                            {{ __('Update this Forum') }}
                        </button>
                        @if (session('idupdated') == $forum->forum_id)
                            <p class="text-sm text-gray-400 ml-4">{{ __('Updated this Forum.') }}</p>
                        @endif
                    </div>
                </form>
                <form method="POST" action="{{ route('game.portal.forum.destroy', ['portal' => $portal, 'forum' => $forum]) }}" class="mt-4">
                    @csrf
                    @method('delete')
                    <input type="number" value="{{ $forum->forum_id }}" name="forum_id" hidden>
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-full text-white bg-red-600 hover:bg-red-700 px-4 py-2">
                            {{ __('Delete this Forum') }}
                        </button>
                    </div>
                </form>
                <a href="{{ route('game.portal.forum.index', ['portal' => $portal]) }}" class="flex items-center justify-center text-white mt-4">
                    {{ __('Go to this Forum') }}
                </a>
            </div>
        </div>
    </div>
</div>
