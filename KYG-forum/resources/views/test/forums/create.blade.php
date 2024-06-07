<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.forums.store') }}" method="POST" style="color: white;">
        @csrf
        <label for="portal_id">Id Portal:</label><br>
        <select id="portal_id" name="portal_id" style="color: black;">
            @if ($portals)
                @foreach ($portals as $portal)
                    <option value="{{ $portal->portal_id }}">{{ $portal->name }} (ID: {{ $portal->portal_id }})</option>
                @endforeach
            @endif
        </select> <br><br>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" style="color: black;">
        <label for="img">URL img:</label>
        <input type="text" id="img" name="img" style="color: black;">
        <button type="submit">Enviar</button>
        @error('title')
            <br>
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </form>


</x-app-layout>
