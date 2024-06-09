@foreach ($discussions as $discussion)
        <div>

        <a href="{{ route('game.portal.forum.discussion.index', ['portal' => $portal, 'forum' => $forum]) }}" class="flex items-center gap-4 text-white">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ old('title', $discussion->title)}}</h2>
        </a>

        <div class="flex items-center gap-4">
    <form method="POST" action="{{ route('game.portal.forum.destroy', ['portal' => $portal, 'forum' => $forum]) }}">
        @csrf
        @method('delete')
        <input type="number" value="{{ $portal->portal_id }}" name="portal_id" hidden>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Portal') }}</x-primary-button>
        </div>
    </form> 
</div>
@endforeach
