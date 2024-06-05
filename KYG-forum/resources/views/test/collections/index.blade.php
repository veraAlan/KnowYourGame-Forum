<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of games in our multi portal.
        </h2>
    </x-slot>
    <br>
    {{-- {{ dd($collections) }} --}}
    <div style="color: white;">
        <h1>The Collections Menu</h1><br>
        <a href="{{ route('test.collections.create', ['games' => json_encode($games)]) }}">Create New Collections</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession

        <br><br>
        @foreach ($collections as $collection)
            <h2>
                <a href="{{ route('test.collections.show', $collection) }}">
                    {{ $collection->category }}
                </a>
            </h2> &nbsp;
            {{-- <a href="{{ route('test.collections.edit', $collections) }}">Edit</a>
            <form action="{{ route('test.collections.destroy', $collections) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br> --}}
        @endforeach
    </div>



</x-app-layout>
