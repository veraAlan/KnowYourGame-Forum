<div class="flex justify-center items-center h-screen">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md text-white w-1/2 mx-2 mb-4" style="margin-right: 20px;">
        <br>
        <form method="POST" action="{{ route('role.create') }}" class="px-6">
            @csrf
            @method('get')
            <label for="name" class="block mb-4">Crear Usuario</label>
            <input type="text" name="name" id="name"
                class="w-full bg-gray-800 text-white placeholder-gray-400 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md mb-4 px-4 py-2">
            <label for="email" class="block mb-4">Correo Electrónico</label>
            <input type="email" name="email" id="email"
                class="w-full bg-gray-800 text-white placeholder-gray-400 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md mb-4 px-4 py-2">
            <label for="password" class="block mb-4">Contraseña</label>
            <input type="password" name="password" id="password"
                class="w-full bg-gray-800 text-white placeholder-gray-400 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md mb-4 px-4 py-2">
            <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
        </form>
        <br>
    </div>

    <div class="bg-gray-800 p-8 rounded-lg shadow-md text-white w-1/2 mx-2 mb-4">
        <br>
        <form method="POST" action="{{ route('roles.create') }}" class="px-6 mb-8">
            @csrf
            @method('get')
            <label for="description" class="block mb-4">Crear Roles</label>
            <input type="text" name="description" id="description"
                class="w-full bg-gray-800 text-white placeholder-gray-400 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md mb-4 px-4 py-2">
            <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
            @if (session('status') == 'created')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="mt-2 text-sm text-gray-300 dark:text-gray-400">{{ __('The Role was created.') }}</p>
            @endif
        </form>
        <br>
    </div>
</div>
