


<div style="color: white">
    <form method="POST" action="{{ route('roles.create') }}"class="px-6">
        @csrf
        @method('get')
        <label for="">Crear Roles</label><br><br>
        <label for="description">Description: </label>
        <input type="text" name="description" style="color: black">
        <button type="submit">Enviar</button>
        @if (session('status') == 'created')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('The Role was created.') }}</p>
        @endif
    </form>
    <br>
    <form method="POST" action="{{ route('role.create') }}"class="px-6">
        @csrf
        @method('get')
        <label for="">Crear Usuario</label><br><br>
        <label for="name">Name: </label>
        <input type="text" name="name" style="color: black"><br><br>
        <label for="description">Email: </label>
        <input type="email" name="email" style="color: black"><br><br>
        <label for="password">Password: </label>
        <input type="text" name="password" style="color: black">
        <button type="submit">Enviar</button>
    </form>
</div>
