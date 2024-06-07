<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.roles.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="description">Description</label>
        <input type="text" id="description" name="description" style="color: black;"><br><br>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
