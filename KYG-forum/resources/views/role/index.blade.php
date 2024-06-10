<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Role
        </h2>
    </x-slot>
    <a href="{{ route('role.permiso.index', ['cambiar_permisos' => true]) }}" style="color: white">Cambiar Permisos</a>

    @include('role.partials.create')



    <br><br>

    <div style="display: flex; justify-content: center; flex-wrap: wrap;">
        <!-- Tabla de Usuarios -->
        <div style="margin-bottom: 20px;">
            <h2 style="color: white; text-align: center;">Usuarios</h2>
            <table style="color: white; margin-right: 20px;">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th> <!-- Botones de acción -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                        <tr>
                            <form method="POST" action="{{ route('role.update') }}" style="display: inline;">
                                @csrf
                                @method('patch')
                                <td><input type="text" name="id" value="{{ $u->id }}" readonly style="color: black;"></td>
                                <td><input type="text" name="name" value="{{ $u->name }}" style="color: black;"></td>
                                <td><input type="email" name="email" value="{{ $u->email }}" style="color: black;"></td>
                                <td><input type="text" name="password" value="{{ $u->password }}" style="color: black;"></td>
                                <td style="text-align: right;"> <!-- Alineación a la derecha -->
                                    <button type="submit">Update</button>
                            </form>
                            <!-- Formulario para eliminar el usuario -->
                            <form method="POST" action="{{ route('role.destroy') }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $u->id }}">
                                <button type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabla de Roles -->
        <div style="margin-bottom: 20px;">
            <h2 style="color: white; text-align: center;">Roles</h2>
            <table style="color: white; margin-right: 20px;">
                <thead>
                    <tr>
                        <th>Role ID</th>
                        <th>Description</th>
                        <th>Actions</th> <!-- Botones de acción -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role as $rol)
                        <tr>

                                <!-- Formulario para actualizar el rol -->
                                <form method="POST" action="{{ route('roles.update', $rol->role_id) }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('patch')
                                    <td><input type="text" name="role_id" value="{{ $rol->role_id }}" readonly style="color: black;"></td>
                                    <td><input type="text" name="description" value="{{ $rol->description }}" style="color: black;"></td>
                                    <td style="text-align: right;"> <!-- Alineación a la derecha -->
                                    <button type="submit">Update</button>
                                </form>
                                <!-- Formulario para eliminar el rol -->
                                <form method="POST" action="{{ route('roles.destroy') }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="role_id" value="{{ $rol->role_id }}">
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div style="display: flex; justify-content: center; flex-wrap: wrap;">
        <!-- Tabla de UserRoles -->
        <div style="margin-bottom: 20px;">
            <h2 style="color: white; text-align: center;">User Roles</h2>
            <table style="color: white;">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Role ID</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userrole as $userrol)
                        <tr>
                            <td><input type="text" value="{{ $userrol->user_id }}" readonly style="color: black;">
                            </td>
                            <td><input type="text" value="{{ $userrol->user->name }}" readonly
                                    style="color: black;"></td>
                            <td><input type="text" value="{{ $userrol->role->role_id }}" readonly
                                    style="color: black;"></td>
                            <td><input type="text" value="{{ $userrol->role->description }}" readonly
                                    style="color: black;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>




</x-app-layout>
