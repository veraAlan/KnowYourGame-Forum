<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 bg-gray-300 dark:bg-gray-700 py-4 px-6 leading-tight rounded-t-lg">
                {{ __('Create New Discussion') }}
            </h2>

            <form method="POST" action="{{ route('game.portal.forum.discussion.create', ['portal' => $portal, 'forum' => $forum]) }}" class="p-6">
                @csrf
                @method('get')
                <input type="hidden" name="forum_id" value="{{ $forum->forum_id }}" hidden>
                <input type="hidden" name="user_id" value="" hidden>

                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Title') }}
                    </h2>
                    <br>
                    <input type="text" id="title" name="title" class="text-black border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-500">
                </x-input-label>

                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Content') }}
                    </h2>
                    <br>
                    <textarea id="content" name="content" class="text-black border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-500"></textarea>
                </x-input-label>

                <button type="submit" class="text-white bg-slate-800 hover:bg-slate-700 py-2 px-6 mt-4 rounded-full">
                    {{ __('Create new Discussion') }}
                </button>
            </form>     
        </div>
    </div>
</div>
