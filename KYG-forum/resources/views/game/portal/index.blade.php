<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            This are the portals inside {{ $games->title }}
        </h2>
    </x-slot>


    {{-- {{dd($wiki, $new, $forum)}} --}}
@if(isset([$wiki, $new, $forum ] == "" )) 

@include('game.portal.partials.edit', ['wiki' => $wiki[0], 'new' => $new[0], 'forum' => $forum[0], 'portal' => $portal]);

@else

@include('wiki.partials.create')
    
@include('news.partials.create')

@include('game.portal.forum.partials.create')

@endif
</x-app-layout>
