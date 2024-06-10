
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('wiki.update') }}">
                @csrf
                @method('patch')
                <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
                <a href="{{ route('wiki.article.index', $wiki) }}" class="flex items-center gap-4 text-white">
                    {{ __('Go to this Wiki.') }}
                </a>
                <input type="textarea" value="{{ old('title', $wiki->title) }}" name="title" class="rounded-full bg-slate-800 border p-2">
                <div class="flex items-center gap-4">
                    <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Update this game</button>
                    @if (session('idupdated') == $wiki->wiki_id)
                        <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Wiki.') }}</p>
                    @endif
                </div>
            </form>
            <form method="POST" action="{{ route('wiki.destroy') }}">
                @csrf
                @method('delete')
                <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
                <div class="flex flex-col flex-wrap align-content-center inline-grid py-1">
                    <button type="submit" class="rounded-full text-white bg-red-950 border p-2">Delete this Wiki</button>
                </div>
            </form>

            <form method="POST" action="{{ route('news.update') }}">
                @csrf
                @method('patch')
                <input type="number" value="{{ $new->news_id }}" name="news_id" hidden>
                <a href="{{ route('news.publications.index', $new) }}" class="flex items-center gap-4 text-white">
                    {{ __('Go to this New.') }}
                </a>
                <input type="textarea" value="{{ old('title', $new->title) }}" name="title" class="rounded-full bg-slate-800 border p-2">
                <div class="flex items-center gap-4">
                    <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Update this game</button>
                    @if (session('idupdated') == $new->news_id)
                        <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Wiki.') }}</p>
                    @endif
                </div>
            </form>
            <form method="POST" action="{{ route('news.destroy') }}">
                @csrf
                @method('delete')
                <input type="number" value="{{ $new->news_id }}" name="news_id" hidden>
                <div class="flex flex-col flex-wrap align-content-center inline-grid py-1">
                    <button type="submit" class="rounded-full text-white bg-red-950 border p-2">Delete this News</button>
                </div>
            </form>

            <form method="POST" action="{{ route('game.portal.forum.update', ['portal' => $portal, 'forum' => $forum]) }}">
                @csrf
                @method('patch')
                <input type="number" value="{{ $forum->forum_id }}" name="forum_id" hidden>
                <div class="flex items-center gap-4">
                    <a href="{{ route('game.portal.forum.index', ['portal' => $portal]) }}" class="flex items-center gap-4 text-white">
                        {{ __('Go to this Forum.') }}
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <input type="textarea" value="{{ old('title', $forum->title) }}" name="title" class="rounded-full bg-slate-800 border p-2">
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Update this game</button>
                    @if (session('idupdated') == $forum->forum_id)
                        <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Wiki.') }}</p>
                    @endif
                </div>
            </form>
            <form method="POST" action="{{ route('game.portal.forum.destroy', ['portal' => $portal, 'forum' => $forum]) }}">
                @csrf
                @method('delete')
                <input type="number" value="{{ $forum->forum_id }}" name="forum_id" hidden>
                <div class="flex flex-col flex-wrap align-content-center inline-grid py-1">
                    <button type="submit" class="rounded-full text-white bg-red-950 border p-2">Delete this Forum</button>
                </div>
            </form>
        </div>
    </div>
</div>