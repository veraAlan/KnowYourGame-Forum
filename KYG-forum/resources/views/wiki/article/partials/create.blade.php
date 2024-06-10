<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 bg-gray-300 dark:bg-gray-700 py-4 px-6 leading-tight rounded-t-lg">
               {{ __('Form') }}
         </h2>
         <form method="POST" action="{{route('wiki.article.create', $wiki)}}" class="p-6">
            @csrf
            @method('get')
            <input value="{{$wiki->wiki_id}}" name="wiki_id" hidden/>
            <x-input-label class="py-2">
               <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                     {{ __('Title of the Article') }}
               </h2>
               <br>
               <input type="text" name="title" class="text-black border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-500">
            </x-input-label>
            <button type="submit" class=" text-white bg-slate-800 hover:bg-slate-700  py-2 px-6 mt-4">{{ __('Create new Article') }}</button>
         </form>
      </div>
   </div>
</div>
