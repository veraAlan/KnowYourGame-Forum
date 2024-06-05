<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            The Portal
        </h2>
    </x-slot>


    <div style="color: white;">
        <br>
        <a href="{{ route('test.portals.create') }}">Create New Portal</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        @foreach ($portals as $portal)
            <h2>
                <a href="{{ route('test.portals.show', $portal) }}">
                    {{ $portal->name }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.portals.edit', $portal) }}">Edit</a>
            <form action="{{ route('test.portals.destroy', $portal) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach
    </div>


</x-app-layout>
