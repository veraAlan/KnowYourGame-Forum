<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                This is the publications for news
            </h2>
        </x-slot>
    
        <form method="POST" action="{{ route('role.permiso.update') }}" class="px-6">
            @csrf
            @method('patch')
            <label for="" style="color: white">Crear ROL USER</label><br><br>
            <label for="user_id" style="color: white">User: </label>
            <select id="user_id" name="user_id" style="color: black;">
                @if ($user)
                    @foreach ($user as $u)
                        <option value="{{ $u->id }}">{{ $u->name }} (ID: {{ $u->id }})</option>
                    @endforeach
                @endif
            </select>
            <label for="role_id" style="color: white">Role: </label>
            <select id="role_id" name="role_id" style="color: black;">
                @if ($role)
                    @foreach ($role as $r)
                        <option value="{{ $r->role_id }}">{{ $r->description }} (ID: {{ $r->role_id }})</option>
                    @endforeach
                @endif
            </select>
            <button type="submit" style="color: white">Cambiar permisos</button>
        </form>
    </x-app-layout>