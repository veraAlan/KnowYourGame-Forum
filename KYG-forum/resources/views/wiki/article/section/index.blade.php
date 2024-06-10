<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      This is the Sections page for {{ $article->title }}.
      </h2>
   </x-slot>

   @include('wiki.article.section.partials.create')

   @include('wiki.article.section.partials.edit')
</x-app-layout>