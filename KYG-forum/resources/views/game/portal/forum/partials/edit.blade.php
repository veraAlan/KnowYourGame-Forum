@include('game.portal.forum.discussion.partials.create')

@foreach ($forums as $forum)
    <form method="POST"
        action="{{ route('game.portal.forum.update', ['game' => $game, 'portal' => $portal, 'forum' => $forum]) }}">
        @csrf
        @method('patch')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"></h2>

        <input type="number" value="{{ $portal->portal_id }}" name="portal_id" hidden>
        <input type="text" value="{{ old('title', $forum->title) }}" name="title">

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Actualizar este Foro') }}</x-primary-button>
            @if (session('idupdated') == $forum->forum_id)
                <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Se actualizó esta sección.') }}</p>
            @endif
        </div>
    </form>

    <form method="POST"
        action="{{ route('game.portal.forum.destroy', ['game' => $game, 'portal' => $portal, 'forum' => $forum]) }}">
        @csrf
        @method('delete')
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Forum') }}</x-primary-button>
        </div>
    </form>
    <br><br>

    @if(isset($discussions[$forum->forum_id]))
        @foreach ($discussions[$forum->forum_id] as $discussion)
            @include('game.portal.forum.discussion.index', [
                'game' => $game,
                'portal' => $portal,
                'forum' => $forum,
                'discussion' => $discussion,
            ])
        @endforeach
    @endif
@endforeach
