<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create a new forum.') }}
            </h2>
            <form action="{{ route('game.portal.forum.create', ['game' => $game, 'portal' => $portal]) }}">
                @csrf
                @method('get')
                <input value="{{ $game->game_id }}" name="game_id" hidden />
                <input value="{{ $portal->portal_id }}" name="article_id" hidden />
                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Title of the forum') }}
                    </h2>
                    <input type="text" name="title" class="text-black">
                </x-input-label>
                <button type="submit" class="rounded-full text-white bg-slate-800 border-2 p-2">Create new
                    Forum</button>
            </form>
        </div>
    </div>
</div>
