<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create New Discussion') }}
            </h2>
            @foreach($forum as $single_forum)
            <form method="POST" action="{{ route('game.portal.forum.discussion.create', ['game' => $game, 'portal' => $portal, 'forum' => $single_forum, 'forum_id' => $single_forum->forum_id, 'portal_id' => $portal->portal_id, 'title' => $single_forum->title]) }}">
                @csrf
                <input type="hidden" name="forum_id" value="{{ $single_forum->forum_id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="date" value="{{ now() }}">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="content">Content:</label><br>
                <textarea id="content" name="content"></textarea><br><br>
                <button type="submit" class="rounded-full text-white bg-slate-800 border-2 p-2">Create new Discussion</button>
            </form>
        @endforeach          
        </div>
    </div>
</div>