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
    @include('flash-messages')
    <div class="min-h-screen flex" :class="darkmode ? 'bg-deep' : 'bg-gray-100'" x-data="{
        darkmode: {{ Auth::user()->mode->darkmode }},
    }">
        {{-- @include('layouts.navigation') --}}

        <!-- Page Heading -->
        @include('layouts.sidebare')
        <div class="flex flex-col w-full overflow-y-auto h-screen">

            @isset($header)

                <header class="shadow flex  justify-between items-center w-full transition-all duration-300"
                    :class="darkmode ? 'bg-black text-white' : 'bg-white'">
                    <div class="py-[1.25rem] flex gap-x-2 px-4 sm:px-6 lg:px-8 w-full">
                        <div class="md:hidden">
                            <input id="checkbox" type="checkbox">
                            <label class="toggle" for="checkbox">
                                <div id="bar1" class="bars" :class="darkmode ? 'bg-white ' : 'bg-black'"></div>
                                <div id="bar2" class="bars" :class="darkmode ? 'bg-white ' : 'bg-black'"></div>
                                <div id="bar3" class="bars" :class="darkmode ? 'bg-white ' : 'bg-black'"></div>
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

                    <form action="{{ route('change.darkmode') }}" method="post">
                        @csrf

                        <button  type="submit" class="cursor-default">
                            <svg x-show="darkmode" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#ffffff" viewBox="0 0 16 16">
                                <path
                                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                            </svg>

                            <svg x-show="!darkmode" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#ffffff" class="bi bi-moon" viewBox="0 0 16 16">
                                <path
                                    d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286" />
                            </svg>
                        </button>
                    </form>

                    <div class="px-5 pt-2" x-data="{ showNotif: false }">
                        <button class="relative">
                            <svg id="visite_icon" x-on:click="showNotif = !showNotif" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="size-6 cursor-pointer" id="notif_bell">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                            @if ($notifications->count() > 0)
                                <div
                                    class="w-4 h-4 bg-red-500 text-white flex justify-center items-center rounded-lg absolute -top-1 -right-2">
                                    <small>{{ min($notifications->count(), 99) }}</small>
                                </div>
                            @endif
                        </button>

                        <div x-cloak x-show="showNotif"
                            class=" absolute right-7 lg:w-[33rem] sm:w-56 ml-5 bg-white border rounded-lg shadow-lg z-50 h-[28rem] mt-3 overflow-y-scroll">
                            <h1 class="text-black text-center pt-6 font-bold">Notification</h1>
                            <div class="p-4 ">
                                <ul>
                                    @foreach ($notifications as $notif)
                                        <li class="py-5 border-b ">
                                            <a href={{ $notif->type === 'cowork' ? route('coworkings.show', $notif->id) : '/contacts?message=' . $notif->id }}
                                                class="py-5 border-b">
                                                <div class="flex flex-col gap-2">
                                                    <div class="flex items-center gap-4">
                                                        @if ($notif->type == 'cowork')
                                                            <img class="w-9 h-9"
                                                                src="https://backend.mylionsgeek.ma/storage/images/b3f559f342e06f437fd818fa6f892d5ec5977e9084a05183dac5c12c4b3bf3fa.WhatsApp%20Image%202024-11-19%20at%2016.11.33%20(2).jpeg"
                                                                alt="">
                                                        @endif
                                                        @if ($notif->type == 'contact')
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="blue"
                                                                class="w-8 h-8">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                                            </svg>
                                                        @endif
                                                        <div class="flex flex-col w-full">
                                                            <div class="flex justify-between items-center">
                                                                <p class="text-sm font-bold text-gray-500">
                                                                    {{ $notif->name }}
                                                                    <span class="text-sm font-normal text-gray-500">
                                                                        {{ $notif->type === 'cowork' ? 'requested to join cowork' : '' }}
                                                                    </span>
                                                                </p>
                                                                <p class="text-xs text-gray-500">
                                                                    {{ $notif->time->diffForHumans() }}
                                                                </p>
                                                            </div>
                                                            <p class="text-sm text-gray-500 truncate w-52">
                                                                {{ $notif->type === 'cowork' ? '' : $notif->message }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                    @endforeach

                                </ul>


                            </div>
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
                                    class="inline-flex  items-center  text-sm leading-4 font-medium  focus:outline-none transition ease-in-out duration-150 ms-1 bg-gray-100 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="#000000" class="size-5">
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
                                            stroke-width="1.5" stroke="#000000" class="size-5">
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
                                                stroke-width="1.5" stroke="#000000" class="size-5">
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
