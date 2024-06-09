    {{-- Wiki --}}


    <form method="POST" action="{{ route('wiki.update') }}">
        @csrf
        @method('patch')
        <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
        <a href="{{ route('wiki.index') }}" class="flex items-center gap-4 text-white">
            {{ __('Go to Wiki.') }}
        </a>
        <input type="textarea" value="{{ old('title', $wiki->title) }}" name="title">
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update this Wiki') }}</x-primary-button>
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
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Wiki') }}</x-primary-button>
        </div>
    </form>

    {{-- News --}}


    <form method="POST" action="{{ route('news.update') }}">
        @csrf
        @method('patch')
        <input type="number" value="{{ $new->news_id }}" name="news_id" hidden>
        <a href="{{ route('news.index') }}" class="flex items-center gap-4 text-white">
            {{ __('Go to New.') }}
        </a>
        <input type="textarea" value="{{ old('title', $new->title) }}" name="title">
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update this Wiki') }}</x-primary-button>
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
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Wiki') }}</x-primary-button>
        </div>
    </form>


    {{-- Forum --}}

    <form method="POST" action="{{ route('game.portal.forum.update', ['portal' => $portal, 'forum' => $forum]) }}">
        @csrf
        @method('patch')
        <input type="number" value="{{ $forum->forum_id }}" name="forum_id" hidden>
        <a href="{{ route('game.portal.forum.index', ['portal' => $portal]) }}" class="flex items-center gap-4 text-white">
            {{ __('Go to Forum.') }}
        </a>
        <input type="textarea" value="{{ old('title', $forum->title) }}" name="title">
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update this Forum') }}</x-primary-button>
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
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Wiki') }}</x-primary-button>
        </div>
    </form>
