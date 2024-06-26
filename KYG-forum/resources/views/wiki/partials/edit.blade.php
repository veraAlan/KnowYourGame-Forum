@foreach($wikis as $wiki)
   <form method="POST" action="{{ route('wiki.update', $wiki) }}">
      @csrf
      @method('patch')
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         
      </h2>
      <a href="{{ route('wiki.article.index', $wiki) }}" class="flex items-center gap-4 text-white">
         {{ __('Go to Articles.') }}
      </a>
      <input type="textarea" value="{{ old('title', $wiki->title) }}" name="title">
      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Update this Wiki') }}</x-primary-button>
         @if(session('idupdated') == $wiki->wiki_id)
            <p
               id="show-update"
               x-data="{ show: true }"
               x-show="show"
               x-transition
               x-init="setTimeout(() => show = false, 2000)"
               class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Updated this Wiki.') }}</p>
         @endif
      </div>
   </form>
   <form method="POST" action="{{ route('wiki.destroy', $wiki) }}">
      @csrf
      @method('delete')
      <input type="number" value="{{ $wiki->wiki_id }}" name="wiki_id" hidden>
      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Delete this Wiki') }}</x-primary-button>
      </div>
   </form>
   <br>
@endforeach