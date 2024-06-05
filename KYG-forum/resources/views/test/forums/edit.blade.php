<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    <form action="{{ route('test.forums.update', ['forums' => $forums]) }}" method="POST" style="color: white;">
        @csrf
        @method('PATCH')
        <div>
            <label for="idforum">ID Category:</label>
            <input name="idforum" value="{{ $forums->idforum }}" style="color: black;" readonly>
        </div>
        <label for="idportal">Id Portal:</label><br>
        <select id="idportal" name="idportal" style="color: black;">
            @if ($portals)
                @foreach ($portals as $portal)
                    <option value="{{ $portal->idportal }}"
                        {{ old('idportal', $forums['idportal']) == $portal->idportal ? 'selected' : '' }}>
                        {{ $portal->name }} (ID: {{ $portal->idportal }})
                    </option>
                @endforeach
            @endif
        </select><br><br>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" style="color: black;"
            value="{{ old('title', $forums['title']) }}">
        <label for="img">URL img:</label>
        <input type="text" id="img" name="img" style="color: black;"
            value="{{ old('img', $forums['img']) }}">
        <button type="submit">Enviar</button>
        @error('title')
            <br>
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </form>


</x-app-layout>
