<x-app-layout>
    <x-slot name="header">
      <a href="{{route('portal', $portal)}}" class="rounded-full text-sm text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
         Go back to {{$portal->name}}
      </a>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-4">
        You are in {{$wiki->title}}
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
            <div class="p-2 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
               <div class="flex flex-col sm:rounded-lg p-4">
                  <span class="font-semibold text-gray-800 dark:text-gray-200 leading-tight" style="width: inherit;width: max-content; font-size:xx-large;">
                     Here are all the articles
                  </span>
                  <!-- Inside this div can be a foreach for multiple Wikis inside this specific portal -->
                  @foreach($wiki->articles as $article)
                     <a href="{{route('article', $article)}}" class="rounded-full text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
                        <span class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                           {{ $article->title }}
                        </span>
                     </a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </x-slot>
</x-app-layout>