<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      This is the Wiki page for {{ $game->title }}.
      </h2>
   </x-slot>

   <a href={{ "/wiki/" . $wiki->idwiki . "/article/create" }}>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2 border rounded-xl w-64">
         Create a new Article.
      </h2>
   </a>

   @foreach($articles as $article)
      <a href={{ $article->idarticle . "/show" }}>
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $article->title }}</h2>
      </a><br>
   @endforeach
</x-app-layout>