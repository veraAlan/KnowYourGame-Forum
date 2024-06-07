@foreach($articles as $article)
   <form method="POST" action="{{ route('wiki.article.update', ['wiki' => $wiki, 'article' => $article]) }}">
      @csrf
      @method('patch')
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
   
      </h2>
      <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
      <a href="{{ route('wiki.article.section.index', [$wiki, $article]) }}" class="flex items-center gap-4 text-white">
         {{ __('Go to this article`s Sections.') }}
      </a>
      <input type="textarea" value="{{ old('title', $article->title) }}" name="title">
      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Update this Article') }}</x-primary-button>
         @if(session('idupdated') == $article->article_id)
            <p
               id="show-update"
               x-data="{ show: true }"
               x-show="show"
               x-transition
               x-init="setTimeout(() => show = false, 2000)"
               class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Updated this Article.') }}</p>
         @endif
      </div>
   </form>
   <form method="POST" action="{{ route('wiki.article.destroy', ['wiki' => $wiki, 'article' => $article]) }}">
      @csrf
      @method('delete')
      <input type="number" value="{{ $article->article_id }}" name="article_id" hidden>
      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Delete this Article') }}</x-primary-button>
      </div>
   </form>
@endforeach