<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.menus.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="name">Name del Menu</label>
        <input type="text" id="name" name="name" style="color: black;"><br><br>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
