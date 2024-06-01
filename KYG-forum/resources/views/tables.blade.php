<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        This is the Tables page.
        </h2>
    </x-slot>

   @foreach($tables as $table)
      <h2 class="text-white">
         @php
            print_r($table[0]);
            echo "<br>";
         @endphp
      </h2>
      <h4 class="text-white">
      @php
         print_r($table[1]);
         echo "<br>";
      @endphp
      </h4>
   @endforeach
</x-app-layout>