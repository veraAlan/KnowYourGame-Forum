<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Form
        </h2>
    </x-slot>


    {{-- <form action="{{ route('test.userroles.update', [$userroles->user_id, $userroles->role_id]) }}" method="POST" style="color: white;">
        @csrf
        @method('PATCH')
        <label for="user_id">Id User:</label>
        <select id="user_id" name="user_id" style="color: black;">
            @if ($users)
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id', $user['id']) == $user->id  ? 'selected' : '' }}>
                        {{ $user->name }} (ID: {{ $user->id }})
                    </option>
                @endforeach
            @endif
        </select> <br><br>

        <label for="id">Id Role:</label>
        <select id="role_id" name="role_id" style="color: black;">
            @if ($roles)
                @foreach ($roles as $role)
                    <option value="{{ $role->role_id }}">{{ $role->description }} (ID: {{ $role->role_id }})</option>
                @endforeach
            @endif
        </select> <br><br>
        <button type="submit">Enviar</button>
    </form> --}}


</x-app-layout>