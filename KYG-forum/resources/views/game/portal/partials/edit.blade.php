@foreach ($portals as $portal)
    <form method="POST" action="{{ route('game.portal.update', ['games' => $games, 'portal' => $portal]) }}">
        @csrf
        @method('patch')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
        <input type="number" value="{{ $games->game_id }}" name="game_id" hidden>
        <a href="{{ route('game.portal.forum.index', [$games, $portal]) }}" class="flex items-center gap-4 text-white">
            {{ __('Go to this forum.') }}
        </a>

        <br>
        <input type="text" value="{{ old('name', $portal->name) }}" name="name">
        <br>
        <input type="text" value="{{ old('name', $portal->description) }}" name="description">
        <br><br>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update this Portal') }}</x-primary-button>
            @if (session('idupdated') == $portal->portal_id)
                <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Portal.') }}</p>
            @endif
        </div>
    </form>
    <br>
    <form method="POST" action="{{ route('game.portal.destroy', ['games' => $games, 'portal' => $portal]) }}">
        @csrf
        @method('delete')
        <input type="number" value="{{ $portal->portal_id }}" name="portal_id" hidden>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Portal') }}</x-primary-button>
        </div>
    </form>
@endforeach
