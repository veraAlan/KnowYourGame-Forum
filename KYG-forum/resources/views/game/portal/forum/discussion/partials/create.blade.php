<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create New Discussion') }}
            </h2>

            <form method="POST" action="{{ route('game.portal.forum.discussion.create', ['portal' => $portal, 'forum' => $forum, 'discussion' => $discussion]) }}">
                @csrf
                @method('get')
                <input type="hidden" name="forum_id" value="{{ $forum->forum_id }}" hidden>
                <input type="hidden" name="user_id" value="" hidden>
                <label for="title" style="color: white">Title:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="content" style="color: white">Content:</label><br>
                <textarea id="content" name="content"></textarea><br><br>
                <button type="submit" class="rounded-full text-white bg-slate-800 border-2 p-2">Create new Discussion</button>
            </form>     
        </div>
    </div>
</div>