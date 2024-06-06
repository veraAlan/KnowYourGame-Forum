<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create a new section.') }}
            </h2>
            <form action="{{ route('wiki.article.section.create', ['wiki' => $wiki, 'article' => $article]) }}">
                @csrf
                @method('get')
                <input value="{{$wiki->idwiki}}" name="idwiki" hidden/>
                <input value="{{$article->idarticle}}" name="idarticle" hidden/>
            <x-input-label class="py-2">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Content of the section') }}
                </h2>
                <input type="text" name="content" class="text-black">
            </x-input-label>
            <button type="submit" class="rounded-full text-white bg-slate-800 border-2 border p-2">Create new Section</button>
            </form>
        </div>
    </div>
</div>