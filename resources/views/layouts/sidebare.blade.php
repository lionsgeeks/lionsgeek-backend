{{-- <div class="w-[16vw] h-[100vh] flex flex-col items-center gap-10 bg-[#fef819] ">
    <div class="">
        <h1 class="text-[25px] font-bold p-5">Lionsgeek</h1>
    </div>
    <div class="flex w-[100%] flex-col items-center gap-5 px-[1rem]">
        <button
            class="w-[100%] py-[.8rem] rounded-[14px] bg-white text-black hover:bg-black hover:text-white transition duration-150 "><a
                class="" href="">Dashboard</a></button>
        <button
            class="w-[100%] py-[.8rem] rounded-[14px] bg-white text-black hover:bg-black hover:text-white transition duration-150 "><a
                class="" href="">Users</a></button>
        <button
            class="w-[100%] py-[.8rem] rounded-[14px] hover:bg-black hover:text-white transition duration-150 {{ request()->routeIs('events.index') ? 'bg-black text-white' : 'bg-white text-black' }}"><a
                class="{{ route('events.index') }}" href="">Events</a></button>

        <a href="{{route('blogs.index')}}">

            <button
            class="w-full py-[.8rem] rounded-[14px] hover:bg-black hover:text-white transition duration-150 {{ request()->routeIs('blogs.index') ? 'bg-black text-white' : 'bg-white text-black' }}">Blogs</button>
        </a>
        <button
            class="w-[100%] py-[.8rem] rounded-[14px] bg-white text-black hover:bg-black hover:text-white transition duration-150 "><a
                class="" href="">More</a></button>
    </div>
</div> --}}
<div class="hidden md:block">
    <div
        class="w-[75px] hover:w-[16vw] transition-all text-nowrap duration-300 group h-screen overflow-y-scroll no-scrollbar bg-black text-white flex flex-col py-5 justify-">
        <div class="flex flex-col w-full">
            <div class="px-[1rem]">
                <a href="{{ route('dashboard') }}" class="text-xl  flex   gap-x-3">
                    <x-application-logo color size="100" />
                    <span class="mt-2 font-extrabold hidden group-hover:block">LionsGeek</span>
                </a>
            </div>

            <div id="nav-content" class='flex flex-col gap-[0.5rem] py-7 px-[0.5rem] relative'>
                <a href='{{ route('dashboard') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('dashboard') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">
                        Dashboard
                    </p>
                </a>
                <a href='{{ route('events.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('events.index') || request()->routeIs('events.create') || request()->routeIs('events.show') ? 'text-alpha bg-gray-800' : '' }} '>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">
                        Events
                    </p>
                </a>
                <a href='{{ route('blogs.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('blogs.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">

                        Blogs
                    </p>
                </a>
                <a href='{{ route('projects.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('projects.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">
                        Projects
                    </p>
                </a>
                <a href='{{ route('contacts.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('contacts.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>

                    <p class="hidden group-hover:block truncate ">

                        Contacts
                    </p>
                </a>
                <a href='{{ route('coworkings.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('coworkings.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">

                        Coworking
                    </p>
                </a>


<<<<<<< Updated upstream
<div
    class="w-[75px] hover:w-[16vw] transition-all text-nowrap duration-150 group h-screen overflow-y-scroll no-scrollbar bg-black text-white flex flex-col py-5 justify-">
    <div class="flex flex-col w-full">
        <div class="px-[1rem]">
            <a href="{{ route('dashboard') }}" class="text-xl  flex   gap-x-3">
                <x-application-logo color size="100" />
                <span class="mt-2 font-extrabold hidden group-hover:block">LionsGeek</span>
            </a>
        </div>
=======
                <a href='{{ route('gallery.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('gallery.index') || request()->routeIs('gallery.create') || request()->routeIs('gallery.show') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">
>>>>>>> Stashed changes

                        Gallery
                    </p>
                </a>
                <a href='{{ route('newsletter.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('newsletter.index') ? 'text-alpha bg-gray-800' : '' }}'>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">

                        Newsletter
                    </p>
                </a>
                <a href='{{ route('infosessions.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('infosessions.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">

                        Info Session
                    </p>
                </a>
                <a href='{{ route('participants.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('participants.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <p class="hidden group-hover:block truncate ">
                        Participants
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="md:hidden z-50">
    <div class="bg-black side-bar rounded-lg fixed top-[11vh] left-[-700px] w-[70vw] flex flex-col  p-5 duration-500 transition-all ">
        <a href='{{ route('dashboard') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('dashboard') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>
            <p class=" group-hover:block truncate ">
                Dashboard
            </p>
        </a>
        <a href='{{ route('events.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('events.index') || request()->routeIs('events.create') || request()->routeIs('events.show') ? 'text-alpha bg-gray-800' : 'text-white' }} '>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
            <p class=" group-hover:block truncate ">
                Events
            </p>
        </a>
        <a href='{{ route('blogs.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('blogs.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
            <p class=" group-hover:block truncate ">

                Blogs
            </p>
        </a>
        <a href='{{ route('projects.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('projects.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
            </svg>
            <p class=" group-hover:block truncate ">
                Projects
            </p>
        </a>
        <a href='{{ route('contacts.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('contacts.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
            </svg>

            <p class=" group-hover:block truncate ">

                Contacts
            </p>
        </a>
        <a href='{{ route('coworkings.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('coworkings.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
            </svg>
            <p class=" group-hover:block truncate ">

                Coworking
            </p>
        </a>


        <a href='{{ route('gallery.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('gallery.index') || request()->routeIs('gallery.create') || request()->routeIs('gallery.show') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
            <p class=" group-hover:block truncate ">

                Gallery
            </p>
        </a>
        <a href='{{ route('newsletter.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('newsletter.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
            <p class=" group-hover:block truncate ">

                Newsletter
            </p>
        </a>
        <a href='{{ route('infosessions.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('infosessions.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
            </svg>
            <p class=" group-hover:block truncate ">

                Info Session
            </p>
        </a>
        <a href='{{ route('participants.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('participants.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
            <p class=" group-hover:block truncate ">
                Participants
            </p>
        </a>
    </div>
</div>
