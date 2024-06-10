<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form method="POST" action="{{ route('game.portal.forum.discussion.update', $discussion) }}"
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            @csrf
            @method('patch')
            <input type="number" value="{{ $discussion->discussion_id }}" name="discussion_id" hidden>
            <h2 class="text-xl text-gray-800 dark:text-gray-200 font-semibold leading-tight">
                {{ $user->name }}
            </h2>
            <label for="title" class="text-white">Title: </label>
            <input type="text" id="title" value="{{ $discussion->title }}" name="title"
                class="rounded-full bg-slate-800 border border-gray-300 p-2 mt-2 focus:outline-none focus:ring focus:border-blue-500">
            <br><br>
            <label for="content" class="text-white mt-4">Content: </label>
            <textarea id="content" name="content"
                class="rounded-full bg-slate-800 border border-gray-300 p-2 mt-2 focus:outline-none focus:ring focus:border-blue-500">{{ $discussion->content }}</textarea>
            <br><br>
                <div class="flex flex-col flex-wrap align-content-center py-1">
                <button type="submit" class="rounded-full text-white bg-slate-800 border border-gray-300 p-2">Update
                    this
                    discussion</button>
                @if (session('idupdated') == $discussion->discussion_id)
                    <p id="show-update" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Updated this Discussion.') }}</p>
                @endif
            </div>
        </form>
        <form method="POST" action="{{ route('game.portal.forum.discussion.destroy', $discussion) }}"
        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4 sm:mt-0">
        @csrf
        @method('delete')
        <input type="number" value="{{ $discussion->discussion_id }}" name="discussion_id" hidden>
        <div class="flex flex-col flex-wrap align-content-center py-1">
            <button type="submit"
                class="rounded-full text-white bg-red-600 border border-gray-300 p-2">Delete
                discussion</button>
        </div>
    </form>
    
    </div>
</div>
