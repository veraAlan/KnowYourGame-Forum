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

   <br>

   <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      @foreach($games as $game)
         <a href="{{route('portal', $game)}}">
            <img class="py-2 object-cover w-full" src="{{asset($game->img)}}" alt="{{'Thumbnail image of: ' . $game->title}}">
         </a>
         @foreach($game->tags as $tag)
         <span class="pt-1 inline-block font-semibold text-sm text-white dark:text-gray-200 leading-tight text-center">
            {{ $tag->category }}
         </span>
         @endforeach
      @endforeach
   </h2>
</x-app-layout>