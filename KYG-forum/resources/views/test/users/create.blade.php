<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.users.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" style="color: black;"><br><br>
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" style="color: black;"><br><br>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" style="color: black;"><br><br>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>
