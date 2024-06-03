<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Forum of {{ $game->title }}.
      </h2>
      <br>
      <h4 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
         Data: {{ $discussions }}
      </h4>
   </x-slot>
   
   <br>

   
</x-app-layout>