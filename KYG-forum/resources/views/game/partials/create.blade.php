<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Form') }}
            </h2>


            <form method="POST" action="{{ route('game.create') }}" enctype="multipart/form-data">
                @csrf
                @method('get')

                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Title of Game') }}
                    </h2>
                    <input type="text" name="title" class="text-black">
                </x-input-label>
                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Img of Game') }}
                    </h2>
                    <input type="file" name="img" class="text-black">
                </x-input-label>
                <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Create new
                    Game</button>
                @if (session('status') == 'created')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('The game was created.') }}</p>
                @endif
            </form>


        </div>
    </div>
</div>