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
         <a href={{ "/portal/" . $game->game_id }}>
            <img src="" alt={{ $game->title }}>
            <h5>{{ $game->title }}</h5>
         </a>
      @endforeach
   </h2>
</x-app-layout>