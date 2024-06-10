<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('games') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('games')" :active="request()->routeIs('games')">
                        {{ __('Games') }}
                    </x-nav-link>
                    @if(Auth::check())
                        @if(Auth::user()->role->role->role_id == 1)
                            <x-nav-link :href="route('game.index')" :active="request()->routeIs('game.index')">
                                {{ __('Edit Games') }}
                            </x-nav-link>
                            <x-nav-link :href="route('role.index')" :active="request()->routeIs('role.index')">
                                {{ __('Edit Role') }}
                            </x-nav-link>
                        @endif
                        @if(Auth::user()->role->role->role_id <= 2)
                            <x-nav-link :href="route('wiki.index')" :active="request()->routeIs('wiki.index')">
                                {{ __('Moderate Wiki') }}
                            </x-nav-link>
                            <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.index')">
                                {{ __('Moderate News') }}
                            </x-nav-link>
                        @endif
                    @endif
                </div>
            </div>

            @if(Auth::check())
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
                @if (Route::has('login'))
                    <nav class=" flex flex-1 justify-end">
                        <a href="{{ route('login') }}" class="flex rounded-md px-3 py-2 text-black ring-1 
                        ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] 
                        dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        style="align-items: center;">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="flex rounded-md px-3 py-2 text-black ring-1 
                            ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] 
                            dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            style="align-items: center;">
                                Register
                            </a>
                        @endif
                    </nav>
                @endif
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('games')" :active="request()->routeIs('games')">
                {{ __('Games') }}
            </x-responsive-nav-link>
            @if(Auth::check())
                @if(Auth::user()->role->role->role_id == 1)
                    <x-responsive-nav-link :href="route('game.index')" :active="request()->routeIs('game.index')">
                        {{ __('Edit Games') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('role.index')" :active="request()->routeIs('role.index')">
                        {{ __('Edit Role') }}
                    </x-responsive-nav-link>
                @endif
                @if(Auth::user()->role->role->role_id <= 2)
                    <x-responsive-nav-link :href="route('wiki.index')" :active="request()->routeIs('wiki.index')">
                        {{ __('Moderate Wiki') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('news.index')" :active="request()->routeIs('news.index')">
                        {{ __('Moderate News') }}
                    </x-responsive-nav-link>
                @endif
            @endif
        </div>


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @if(Auth::check())
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            @endif
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
