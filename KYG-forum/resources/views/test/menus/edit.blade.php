<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.menu.update', ['menus' => $menus]) }}" method="POST" style="color: white;">
        @csrf
        @method('PATCH')
        <div>
            <label for="id">ID Menu:</label>
            <input name="id" value="{{ $menus->menuid }}" style="color: black;" readonly>
        </div><br>
        <label for="name">Name del Menu</label>
        <input type="text" id="name" name="name" style="color: black;" value="{{ old('name', $menus['name']) }}"><br><br>
        <button type="submit">Enviar</button>
    </form>


</x-app-layout>