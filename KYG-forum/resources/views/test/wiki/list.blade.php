<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      This is the Wikis page.
      </h2>
   </x-slot>

   <a href="/wiki/create">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2 border rounded-xl w-64">
         Create a new Wiki.
      </h2>
   </a>

   @foreach($wikis as $wiki)
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $wiki->title }}</h2>
         <a href={{ $wiki->idwiki . "/edit" }} class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">edit</a>
         <br>
   @endforeach
</x-app-layout>