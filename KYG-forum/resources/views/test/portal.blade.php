<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Main page of portal of {{ $game->title }}.
      </h2>
      <br>
      <h4 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
         Data: {{ $portal }}
      </h4>
   </x-slot>

   <br>

   <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      @if(isset($options['wiki']))
      <a href={{ "/wiki/" . $options['wiki']->wiki_id }}>{{ $options['wiki']->title }}</a> <br>
      @endif

      @if(isset($options['forum']))
         <a href={{ "/forum/" . $options['forum']->forum_id }}>{{ $options['forum']->title }}</a> <br>
      @endif

      @if(isset($options['news']))
         <a href={{ "/news/" . $options['news']->news_id }}>News</a>
      @endif
   </h2>
</x-app-layout>