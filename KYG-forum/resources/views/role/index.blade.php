<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Administracion de Roles
        </h2>
    </x-slot>

    <br>
    @include('role.partials.create')
    <br>


    <div class="flex justify-center items-center">
        <a href="{{ route('role.permiso.index', ['cambiar_permisos' => true]) }}" class="bg-gray-800 px-4 py-2 rounded-lg shadow-md text-white hover:bg-gray-700">Cambiar Permisos</a>
    </div>

<br>
    <div class="flex justify-center items-center flex-wrap">
        <!-- Tabla de Usuarios -->
        <div class="m-4">
            <h2 class="text-white text-center mb-4">Usuarios</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700 text-white">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Password</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                            <tr class="text-gray-800">
                                <form method="POST" action="{{ route('role.update') }}" class="inline">
                                    @csrf
                                    @method('patch')
                                    <td><input type="text" name="id" value="{{ $u->id }}" readonly
                                            class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                    <td><input type="text" name="name" value="{{ $u->name }}"
                                            class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                    <td><input type="email" name="email" value="{{ $u->email }}"
                                            class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                    <td><input type="text" name="password" value="{{ $u->password }}"
                                            class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                    <td class="text-right">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                                </form>
                                <!-- Formulario para eliminar el usuario -->
                                <form method="POST" action="{{ route('role.destroy') }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $u->id }}">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center flex-wrap">
        <!-- Tabla de Roles -->
        <div class="m-4">
            <h2 class="text-white text-center mb-4">Roles</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700 text-white">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-4 py-2">Role ID</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $rol)
                            <tr class="text-gray-800">
                                <form method="POST" action="{{ route('roles.update', $rol->role_id) }}" class="inline">
                                    @csrf
                                    @method('patch')
                                    <td><input type="text" name="role_id" value="{{ $rol->role_id }}" readonly
                                            class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                    <td><input type="text" name="description" value="{{ $rol->description }}"
                                            class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                    <td class="text-right">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                                </form>
                                <!-- Formulario para eliminar el rol -->
                                <form method="POST" action="{{ route('roles.destroy') }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="role_id" value="{{ $rol->role_id }}">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center flex-wrap">
        <!-- Tabla de UserRoles -->
        <div class="m-4">
            <h2 class="text-white text-center mb-4">User Roles</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700 text-white">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Role ID</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userrole as $userrol)
                            <tr class="text-gray-800">
                                <td><input type="text" value="{{ $userrol->user_id }}" readonly
                                        class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                <td><input type="text" value="{{ $userrol->user->name }}" readonly
                                        class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                <td><input type="text" value="{{ $userrol->role->role_id }}" readonly
                                        class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                <td><input type="text" value="{{ $userrol->role->description }}" readonly
                                        class="bg-gray-800 text-white px-4 py-2 rounded"></td>
                                <td>
                                    <form method="POST" action="{{ route('roles.update', $userrol->role_id) }}"
                                        class="inline">
                                        @csrf
                                        @method('patch')
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                                    </form>
                                    <!-- Formulario para eliminar el rol -->
                                    <form method="POST" action="{{ route('roles.destroy') }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="role_id" value="{{ $userrol->role_id }}">
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
</x-app-layout>
