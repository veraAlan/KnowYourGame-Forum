<x-app-layout>
   <x-slot name="header">
      <a href="{{route('game.portal.index', $portal->game)}}" class="rounded-full text-sm text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
            Go back to {{$portal->name}}
      </a>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         This is the Wikis page.
      </h2>
   </x-slot>
   
   <!-- Wiki deleted toast -->
   {{-- @if(session('status') == 'deleted')
      <p
         x-data="{ show: true }"
         x-show="show"
         x-transition
         x-init="setTimeout(() => show = false, 2000)"
         class="text-sm text-gray-600 dark:text-gray-400"
      >{{ __('The wiki was deleted.') }}</p>
   @endif --}}

   @include('wiki.partials.create')

   @include('wiki.partials.edit')
</x-app-layout>