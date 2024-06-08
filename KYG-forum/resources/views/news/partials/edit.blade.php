@foreach ($news as $new)
    <form method="POST" action="{{ route('wiki.update') }}">
        @csrf
        @method('patch')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
        <input type="number" value="{{ $new->news_id }}" name="news_id" hidden>
        <a href="{{ route('news.publication.index', $new) }}" class="flex items-center gap-4 text-white">
            {{ __('Go to publications.') }}
        </a>
        <input type="textarea" value="{{ old('title', $new->news_id) }}" name="title">
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update this New') }}</x-primary-button>
            @if (session('idupdated') == $new->news_id)
                <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Wiki.') }}</p>
            @endif
        </div>
    </form>
    <form method="POST" action="{{ route('wiki.destroy') }}">
        @csrf
        @method('delete')
        <input type="number" value="{{ $new->news_id }}" name="wiki_id" hidden>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Wiki') }}</x-primary-button>
        </div>
    </form>
    <br>
@endforeach
