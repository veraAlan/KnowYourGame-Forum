<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Form') }}
            </h2>
            <form method="POST" action="{{ route('news.create') }}">
                @csrf
                @method('get')
                <x-input-label class="py-2">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Portal') }}
                    </h2>
                    <select name='portal_id' id='portal_id' class="text-black">
                        @foreach ($portals as $portal)
                            <option value={{ print_r($portal->id) }}>{{ $portal->name }}</option>
                        @endforeach
                    </select>
                </x-input-label>
                <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">Create a new</button>
                @if (session('status') == 'created')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('The New was created.') }}</p>
                @endif
            </form>
        </div>
    </div>
</div>
