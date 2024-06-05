<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>
    <form action="{{ route('test.collections.update', ['collection' => $collections->id]) }}" method="POST" style="color: white;">
        @csrf
        @method('PATCH')
    
        <label for="idgame">IdGame:</label>
        <select id="idgame" name="idgame" style="color: black;">
            @if ($games)
                @foreach($games as $game)
                    <option value="{{ $game['idgame'] }}">{{ $game['title'] }} (ID: {{ $game['idgame'] }})</option>
                @endforeach
            @endif
        </select>
    
        <label for="category">Categoría:</label>
        <input type="text" id="category" name="category" style="color: black;"
               value="{{ old('category', $collections->category) }}"><br><br>
    
        <button type="submit">Enviar</button>
    
        @error('category')
            <br>
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </form>
    

</x-app-layout>
