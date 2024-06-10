<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cambiar Roles a Usuarios
        </h2>
    </x-slot>
    <br>
    <div class="flex justify-center items-center h-screen ml-250 mr-250" style="margin-left: 200px;margin-right: 200px;">
        <div class="bg-gray-800 p-8 rounded-lg shadow-md text-white w-full md:max-w-md">
            <form method="POST" action="{{ route('role.permiso.update') }}" class="px-6 mb-8">
                @csrf
                @method('patch')
                <br>

                <div class="mb-4">
                    <label for="user_id" class="block text-white">User: </label><br>
                    <select id="user_id" name="user_id"
                        class="w-full bg-gray-800 text-white border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md px-4 py-2">
                        @if ($user)
                            @foreach ($user as $u)
                                <option value="{{ $u->id }}">{{ $u->name }} (ID: {{ $u->id }})
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <br>
                <div class="mb-4">
                    <label for="role_id" class="block text-white">Role: </label><br>
                    <select id="role_id" name="role_id"
                        class="w-full bg-gray-800 text-white border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md px-4 py-2">
                        @if ($role)
                            @foreach ($role as $r)
                                <option value="{{ $r->role_id }}">{{ $r->description }} (ID: {{ $r->role_id }})
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <br>
                <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded float-right border border-white">Cambiar
                    permisos</button>
                <br><br>
            </form>
        </div>
    </div>
    
</x-app-layout>
