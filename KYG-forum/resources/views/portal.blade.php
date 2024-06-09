<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        List of games in our multi portal.
      </h2>
      @if(isset($error))
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $error }}
      </h2>
      @endif
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="grid grid-cols-3 gap-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <a href="{{route('portals.wiki', $wiki)}}">
               <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                  {{ $wiki->title }}
               </h2>
            </a>

            <a href="{{route('portals.forum', $forum)}}">
               <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                  {{ $forum->title }}
               </h2>
            </a>

            <a href="{{route('portals.news', $news)}}">
               <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                  {{ $news->title }}
               </h2>
            </a>
         </div>
      </div>
   </div>
</x-app-layout>