<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        List of games in our multi portal.
      </h2>
      @if(session('status'))
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="color:rgb(160 40 23)">
        {{ session('status') }}
      </h2>
      @endif
   </x-slot>
   
   <x-slot name="slot">
      <div class="container py-6">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid-view bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg" style="
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: center;
            gap: 20px;">
               @foreach($games as $game)
               <div class="grid p-6 shadow-xl" style="
               display: flex;
               width: calc(33% - 10px);
               flex-direction: column;
               justify-content: flex-end;">
                  <img class="py-2 object-cover w-full" src="{{asset($game->img)}}" alt="{{'Thumbnail image of: ' . $game->title}}">
                  <div class="flex flex-col border border-2 rounded-md" style="border-color: rgb(165 180 252);">
                     <a href="{{route('portal', $game)}}" class="font-semibold leading-tight text-center" style="font-size:xx-large; color: rgb(165 180 252);">
                     {{ $game->title }}
                     </a>
                     @foreach($game->tags as $tag)
                     <span class="pt-1 inline-block font-semibold text-sm text-white dark:text-gray-200 leading-tight text-center">
                        {{ $tag->category }}
                     </span>
                     @endforeach
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </x-slot>
</x-app-layout>