<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit wiki') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                     {{ __('Form') }}
               </h2>
               <form method="POST" action="update">
                  @csrf
                  <h2 class="pt-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Already set values: ') }}
                  </h2>
                  <input name="idwiki" value="{{ $wiki->idwiki }}" hidden>
                  <input value="{{ 'ID: ' . $wiki->idwiki }}" disabled class="font-semibold text-xl text-black dark:text-black leading-tight">
                  <input value="{{ 'Last portal ID: ' . $wiki->idportal }}" disabled class="font-semibold text-xl text-black dark:text-black leading-tight">
                  <h2 class="pt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Changeable:') }}
                  </h2>
               <x-input-label class="py-2">
                  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Portal') }}
                  </h2>
                  <select name='idportal' id='idportal' class="text-black">
                     @foreach($portals as $portal)
                        <option value={{ print_r($portal->id); }}>{{ $portal->name }}</option>
                     @endforeach
                  </select>
               </x-input-label>
               <x-input-label class="py-2">
                  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Title of Wiki') }}
                  </h2>
                  <input type="text" name="title" value={{ $wiki->title }} class="text-black">
               </x-input-label>
               <button type="submit" class="rounded-full text-white bg-slate-800 border-2 border p-2">Edit Wiki</button>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>