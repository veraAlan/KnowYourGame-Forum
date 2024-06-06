<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      This is the Wiki page for {{ $game->title }}.
      </h2>
   </x-slot>

   <a href="create">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2 border rounded-xl w-64">
         Create a new Section.
      </h2>
   </a>

   @foreach($sections as $section)
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $section->content }}</h2><br>
   @endforeach
</x-app-layout>