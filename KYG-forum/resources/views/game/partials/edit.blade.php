@foreach ($games as $game)
    <form method="POST" action="{{ route('game.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
        <input type="number" value="{{ $game->game_id }}" name="game_id" hidden>
        <a href="{{ route('game.portal.index', $game) }}" class="flex items-center gap-4 text-white">
            {{ __('Go to Portal.') }}
        </a>


        <input type="text" value="{{ old('title', $game->title) }}" name="title">
        <br><br>
        <input type="file" name="img" class="text-black">
        
        {{-- <img src="{{ asset($game->img) }}" alt=""> --}}
        <br><br>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update this Game') }}</x-primary-button>
            @if (session('idupdated') == $game->game_id)
                <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Game.') }}</p>
            @endif
        </div>
    </form>
    {{-- <form method="POST" action="{{ route('wiki.destroy') }}">
        @csrf
        @method('delete')
        <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Wiki') }}</x-primary-button>
        </div>
    </form> --}}
    <br>
@endforeach
