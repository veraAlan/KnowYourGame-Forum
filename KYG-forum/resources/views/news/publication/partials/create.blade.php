<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-x1 text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create a new section.') }}
            </h2>
            <form action="{{ route('news.publication.create', ['game' => $game, 'news' => $news, 'publication' => $publication ])}}">
                @csrf
                @method('get')
                <input value="{{$news->news_id}}" name="news_id" id="news_id" hidden>
                <input value="{{$games->game_id}}" name="game_id" id="game_id" hidden>
            <x-input-label class="py-2">
                <h2 class="font-semibold text-x1 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Content of publication')}}
                </h2>
                <input type="text" name="content" class="text-black">
            </x-input-label>
            <button type="submit" class="rounded-full text-white bg-slate-800 border-2 border p-2">Create new publication</button> 
            </form>
        </div>
    </div>
</div>