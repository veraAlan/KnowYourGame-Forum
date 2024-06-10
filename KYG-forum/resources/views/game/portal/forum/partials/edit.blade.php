<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            @foreach ($discussions as $discussion)
            <div class="py-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('game.portal.forum.discussion.index', $discussion) }}" class=" p-6 flex items-center gap-4 text-white">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ old('title', $discussion->title) }}</h2>
                </a>
                <form method="POST"
                    action="{{ route('game.portal.forum.discussion.destroy', ['portal' => $portal, 'forum' => $forum, 'discussion' => $discussion]) }}"
                    class="p-6">
                    @csrf
                    @method('delete')
                    <input type="number" value="{{ $portal->portal_id }}" name="portal_id" hidden>
                    <div class="flex items-center gap-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Delete this Discussion
                        </button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>





