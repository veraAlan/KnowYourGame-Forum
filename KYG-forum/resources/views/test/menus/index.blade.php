<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome to the section of news
        </h2>
    </x-slot>

    <div style="color: white;">
        <br>
        <a href="{{ route('test.menus.create') }}">Create New Menu</a>
        @session('status')
            <div> {{ $value }} </div>
        @endsession
        <br><br>
        @foreach ($menus as $menu)
            <h2>
                <a href="{{ route('test.menus.show', $menu->menuid) }}">
                    {{ $menu->name }}
                </a>
            </h2> &nbsp;
            <a href="{{ route('test.menus.edit', $menu->menuid) }}">Edit</a>
            <form action="{{ route('test.menus.destroy', $menu->menuid) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <br>
        @endforeach
    </div>

</x-app-layout>
