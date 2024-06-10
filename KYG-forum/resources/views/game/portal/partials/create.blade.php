<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">
                {{ __('Form') }}
            </h2>
            <form method="POST" action="{{ route('game.portal.create', $games) }}">
                @csrf
                @method('get')
                <input value="{{ $games->game_id }}" name="game_id" hidden />
                <div class="mb-4">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Name of the Portal') }}
                    </h2>
                    <input type="text" name="name" class="w-full sm:max-w-2/4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent px-3 py-2 bg-white text-gray-700">
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Description of the Portal') }}
                    </h2>
                    <input type="text" name="description" class="w-full sm:max-w-2/4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent px-3 py-2 bg-white text-gray-700">
                </div>
                <button type="submit" class="rounded-full text-white bg-slate-800 border-2 p-2">
                    {{ __('Create Portal') }}
                </button>
            </form>
        </div>
    </div>
</div>
