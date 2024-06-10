<x-app-layout>
    <x-slot name="header">
      <a href="{{route('games')}}" class="rounded-full text-sm text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
         Go back to Games
      </a>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
        List of portals for {{ $game->title }}
      </h2>
      @if(session('status'))
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ session('status') }}
      </h2>
      @endif
   </x-slot>

   <x-slot name="slot">
      <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-6 bg-white dark:bg-zinc-900 shadow-sm sm:rounded-lg" style=" 
               display: flex;
               flex-direction: row;
               flex-wrap: wrap;
               justify-content: space-around;
               align-items: center;">
               <div style="width: calc(33% - 20px); margin: 0 10px;" class="flex flex-col dark:bg-gray-800 sm:rounded-lg">
                  <span class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center py-4" style="font-size:x-large;">
                     Get More Knowledge.
                  </span>
                  <!-- Inside this div can be a foreach for multiple Wikis inside this specific portal -->
                  <a href="{{route('wiki', $wiki)}}" class="rounded-full text-white bg-slate-800 border p-2 text-center self-center" style="width: inherit;width: max-content;padding: 5px 30px; margin: 10px 0;">
                     <span class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ $wiki->title }}
                     </span>
                  </a>
               </div>
               <div style="width: calc(33% - 20px); margin: 0 10px;" class="flex flex-col dark:bg-gray-800 sm:rounded-lg">
                  <span class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center py-4" style="font-size:x-large;">
                     Talk with the Community.
                  </span>
                  <!-- Inside this div can be a foreach for multiple Forums inside this specific portal -->
                  <a href="{{route('forum', $forum)}}" class="rounded-full text-white bg-slate-800 border p-2 text-center self-center" style="width: inherit;width: max-content;padding: 5px 30px; margin: 10px 0;">
                     <span class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ $forum->title }}
                     </span>
                  </a>
               </div>
               <div style="width: calc(33% - 20px); margin: 0 10px;" class="flex flex-col dark:bg-gray-800 sm:rounded-lg px-4">
                  <span class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center py-4" style="font-size:x-large;">
                     Latest news.
                  </span>
                  <!-- Inside this div can be a foreach for multiple News inside this specific portal -->
                  <a href="{{route('news', $news)}}" class="rounded-full text-white bg-slate-800 border p-2 text-center self-center" style="width: inherit;width: max-content;padding: 5px 30px; margin: 10px 0;">
                     <span class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ $news->title }}
                     </span>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </x-slot>
</x-app-layout>