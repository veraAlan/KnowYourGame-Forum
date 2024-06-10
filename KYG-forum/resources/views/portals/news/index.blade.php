<x-app-layout>
    <x-slot name="header">
      <a href="{{route('portal', $portal->game)}}" class="rounded-full text-white bg-slate-800 border" style="width: max-content; padding: 5px 30px; margin: 10px 0;">
         Go back to {{$portal->name}}
      </a>
      @if(session('status'))
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ session('status') }}
      </h2>
      @endif
   </x-slot>

   <x-slot name="slot">
      <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
               <div class="grid grid-cols-2 gap-4 sm:rounded-lg p-4 items-center">
                  <span class="flex font-semibold justify-center text-gray-800 dark:text-gray-200 leading-tight p-4" style="grid-column: span 2 / span 2; font-size: 3.75rem;">
                     {{$news->title}}
                  </span>
                  <!-- Inside this div can be a foreach for multiple newss inside this specific portal -->
                  @foreach($news->publications as $publication)
                  <div class="flex flex-col p-2 border border-2 rounded-md shadow-xl h-full" style="
                  border-color: rgb(165 180 252);
                  display: flex;
                  justify-content: space-between;">
                     <img src="{{asset($publication->img)}}" alt="{{'Thumbnail for ' . $publication->title}}">
                     <div class="flex flex-col">
                        <span class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2">
                           {{ $publication->title }}
                        </span>
                        <span class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight py-2">
                           {{ $publication->content }}
                        </span>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </x-slot>
</x-app-layout>