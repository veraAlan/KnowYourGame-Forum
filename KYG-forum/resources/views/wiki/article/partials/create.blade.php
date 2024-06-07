<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Form') }}
         </h2>
         <form method="POST" action="{{route('wiki.article.create', $wiki)}}">
            @csrf
            @method('get')
            <input value="{{$wiki->wiki_id}}" name="wiki_id" hidden/>
            <x-input-label class="py-2">
               <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                     {{ __('Title of the Article') }}
               </h2>
               <input type="text" name="title" class="text-black">
            </x-input-label>
            <button type="submit" class="rounded-full text-white bg-slate-800 border-2 border p-2">Create new Article</button>
         </form>
      </div>
   </div>
</div>