<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('game.portal.forum.discussion.update', $discussion) }}">
                @csrf
                @method('patch')
                <input type="number" value="{{ $discussion->discussion_id }}" name="discussion_id" hidden>
                <h2>{{ $user->name }}</h2>
                <input type="text" value="{{ $discussion->title }}" name="title">

                <input type="textarea" value="{{ $discussion->content }}" name="content"
                    class="rounded-full bg-slate-800 border p-2">
                <div class="flex items-center gap-4">
                    <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Update this
                        discussion</button>
                    @if (session('idupdated') == $discussion->discussion_id)
                        <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Discussion.') }}</p>
                    @endif
                </div>
            </form>
            <form method="POST" action="{{ route('game.portal.forum.discussion.destroy', $discussion) }}">
                @csrf
                @method('delete')
                <input type="number" value="{{ $discussion->discussion_id }}" name="discussion_id" hidden>
                <div class="flex flex-col flex-wrap align-content-center inline-grid py-1">
                    <button type="submit" class="rounded-full text-white bg-red-950 border p-2">Delete
                        discussion</button>
                </div>
            </form>
        </div>
    </div>
</div>

