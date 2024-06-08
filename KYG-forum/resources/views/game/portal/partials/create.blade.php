<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Form') }}
            </h2>
            <form method="POST" action="{{ route('game.portal.create', $games) }}">
                @csrf
                @method('get')
                <input value="{{ $games->game_id }}" name="game_id" hidden />
                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Name of the Portal') }}
                    </h2>
                    <input type="text" name="name" class="text-black">
                </x-input-label>
                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Description of the Portal') }}
                    </h2>
                    <input type="text" name="description" class="text-black">
                </x-input-label>
                <button type="submit" class="rounded-full text-white bg-slate-800 border-2 p-2">Create new
                    Portal</button>
            </form>
        </div>
    </div>
</div>
