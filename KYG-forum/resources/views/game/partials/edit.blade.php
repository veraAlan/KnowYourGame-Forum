<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            @foreach($games as $game)
            <div class="flex flex-col flex-wrap align-content-center p-6 inline-grid">
                <form method="POST" action="{{ route('game.update', $game) }}" class="flex flex-col flex-wrap align-content-center inline-grid">
                    @csrf
                    @method('patch')
                    <input type="number" value="{{ $game->game_id }}" name="game_id" hidden>
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Click the image for the game portal! test') }}
                    </h2>
                    <a href="{{route('game.portal.index', $game)}}">
                        <img class="py-2 object-cover w-full" src="{{asset($game->img)}}" alt="{{'Thumbnail image of: ' . $game->title}}">
                    </a>
                    <input type="file" name="img" class="rounded-full text-white bg-slate-800 border p-2"/>
                    <span class="inline-block font-semibold text-3xl text-white dark:text-gray-200 leading-tight text-center">
                        <input type="text" value="{{ old('title', $game->title) }}" name="title" class="text-black">
                    </span>
                    <span class="pt-1 inline-block font-semibold text-sm text-white dark:text-gray-200 leading-tight text-center">
                        Categories:
                    </span>
                    @foreach($game->tags as $tag)
                    <span class="pt-1 inline-block font-semibold text-sm text-white dark:text-gray-200 leading-tight text-center">
                        {{ $tag->category }}
                    </span>
                    @endforeach
                    <div class="flex flex-col flex-wrap align-content-center inline-grid py-1">
                    <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Update this game</button>
                        @if(session('idupdated') == $game->game_id)
                            <p
                            id="show-update"
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                            >{{ __('Updated this Game.') }}</p>
                        @endif
                    </div>
                </form>
                <form method="POST" action="{{ route('game.destroy', $game) }}">
                    @csrf
                    @method('delete')
                    <input type="number" value="{{ $game->game_id }}" name="game_id" hidden>
                    <div class="flex flex-col flex-wrap align-content-center inline-grid py-1">
                        <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Delete this Game</button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
