<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LG-BackOffice</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex bg-gray-100">
        {{-- @include('layouts.navigation') --}}

        <!-- Page Heading -->
        @include('layouts.sidebare')
        <div class="flex flex-col w-full overflow-y-auto h-screen">
            @isset($header)
                <header class="bg-white shadow flex items-center justify-between items-center w-full ">
                    <div class="max-w-7xl py-[1.25rem] flex gap-x-2 px-4 sm:px-6 lg:px-8 w-full">
                        <div class="md:hidden">
                            <input id="checkbox" type="checkbox">
                            <label class="toggle" for="checkbox">
                                <div id="bar1" class="bars"></div>
                                <div id="bar2" class="bars"></div>
                                <div id="bar3" class="bars"></div>
                            </label>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            @if (isset($title))
                                <h2 class="text-alpha leading-tight capitalize font-bold text-xl">
                                    {{ $title }}
                                </h2>
                            @endif
                            @if (isset($button))
                                {{ $button }}
                            @endif
                            {{ $header }}
                        </div>

                    </div>
                    <div class="md:hidden">
                        <div class="px-[1rem]">
                            <a href="{{ route('dashboard') }}" class="text-xl  flex   gap-x-3">
                                <x-application-logo color size="100" />
                                <span class="mt-2 font-extrabold hidden group-hover:block">LionsGeek</span>
                            </a>
                        </div>
                    </div>
                    <div class="hidden mr-4 sm:flex {{ isset($header) ? '' : 'sm:ml-auto' }}">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center  text-sm leading-4 font-medium  focus:outline-none transition ease-in-out duration-150 ms-1 bg-gray-100 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="px-3 pt-2 pb-1 border-gray-200 border-b-2">
                                    <p class="font-bold m-0 capitalize">{{ Auth::user()->name }}</p>
                                    <p class="m-0">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                                <x-dropdown-link :href="route('profile.edit')" class="no-underline">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                        <p class="m-0 font-semibold">
                                            {{ __('Profile') }}
                                        </p>
                                    </div>
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" class="no-underline"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                            </svg>
                                            <p class="m-0 font-semibold">
                                                {{ __('Log Out') }}
                                            </p>
                                        </div>
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                        <!-- Settings Dropdown -->
                    </div>
                </header>
            @endisset
            {{-- side bar --}}
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
