@foreach($sections as $section)
   <form method="POST" action="{{ route('wiki.article.section.update', ['wiki' => $wiki, 'article' => $article, 'section' => $section]) }}">
      @csrf
      @method('patch')
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"></h2>
      <input type="number" value="{{ $section->section_id }}" name="section_id" hidden>
      <input type="textarea" value="{{ old('content', $section->content) }}" name="content">
      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Update this Article') }}</x-primary-button>
         @if(session('idupdated') == $section->section_id)
            <p
               id="show-update"
               x-data="{ show: true }"
               x-show="show"
               x-transition
               x-init="setTimeout(() => show = false, 2000)"
               class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Updated this Section.') }}</p>
         @endif
      </div>
   </form>
   <form method="POST" action="{{ route('wiki.article.section.destroy', ['wiki' => $wiki, 'article' => $article, 'section' => $section]) }}">
      @csrf
      @method('delete')
      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Delete this Section') }}</x-primary-button>
      </div>
   </form>
@endforeach