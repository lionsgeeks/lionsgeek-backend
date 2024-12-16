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
                <div class="flex flex-col items-start gap-2 w-[100%] ">
                    <!-- Dropdown Toggle Button -->
                    <div class="w-[100%] nav-button no-underline text-base font-bold flex gap-2 items-center   py-[0.75rem] px-[1rem] bg-black text-white  rounded-xl  hover:text-alpha hover:bg-gray-800 transition-all duration-300">
                        <button id="dropdownButton1" class="flex items-center gap-2 w-[100%] ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                              </svg>
                            <div class="hidden group-hover:flex truncate  items-center gap-2">
                                Articles
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu1" class="hidden  flex-col gap-2 group-hover:ms-5 ms-0 w-[91%]  bg-black text-white rounded-lg shadow-md transition-all duration-300">
                        <a href='{{ route('blogs.index') }}'
                            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('blogs.index') ? 'text-alpha bg-gray-800' : '' }} transition-all duration-300 ease-in-out'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                            <p class="hidden group-hover:block truncate">
                                Blogs
                            </p>
                        </a>
                        <a href='{{ route('press.index') }}'
                            class='nav-button no-underline mt-2 text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('press.index') || request()->routeIs('press.create') || request()->routeIs('press.show') ? 'text-alpha bg-gray-800' : '' }} transition-all duration-300 ease-in-out'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                            <p class="hidden group-hover:block truncate">
                                Press
                            </p>
                        </a>
                    </div>
                </div>
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
                <div class="flex flex-col items-start gap-2 w-[100%] ">
                    <!-- Dropdown Toggle Button -->
                    <div class="w-[100%] nav-button no-underline text-base font-bold flex gap-2 items-center   py-[0.75rem] px-[1rem] bg-black text-white  rounded-xl hover:text-alpha hover:bg-gray-800 transition-all duration-300">
                        <button id="dropdownButton2" class="flex items-center gap-2 w-[100%] ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                              </svg>
                            <div class="hidden group-hover:flex truncate  items-center gap-2">
                                Connect
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu2" class="hidden flex-col gap-2 group-hover:ms-5 ms-0 w-[91%]  bg-black text-white rounded-lg shadow-md transition-all duration-300">
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
                            class='nav-button no-underline mt-2 text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('coworkings.index') ? 'text-alpha bg-gray-800' : '' }}'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                            </svg>
                            <p class="hidden group-hover:block truncate ">
                                Coworking
                            </p>
                        </a>
                    </div>
                </div>
                <a href='{{ route('gallery.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('gallery.index') || request()->routeIs('gallery.create') || request()->routeIs('gallery.show') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
                      </svg>
                    <p class="hidden group-hover:block truncate ">
                        Gallery
                    </p>
                </a>
                <a href='{{ route('newsletter.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('newsletter.index') ? 'text-alpha bg-gray-800' : '' }}'>

                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                      </svg>
                    <p class="hidden group-hover:block truncate ">

                        Newsletter
                    </p>
                </a>
                <div class="flex flex-col items-start gap-2 w-[100%] ">
                    <!-- Dropdown Toggle Button -->
                    <div class="w-[100%] nav-button no-underline text-base font-bold flex gap-2 items-center   py-[0.75rem] px-[1rem] bg-black text-white  rounded-xl hover:text-alpha hover:bg-gray-800 transition-all duration-300">
                        <button id="dropdownButton3" class="flex items-center gap-2 w-[100%] ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-person-video3" viewBox="0 0 16 16">
                                <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2"/>
                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783Q16 12.312 16 12V4a2 2 0 0 0-2-2z"/>
                              </svg>
                            <div class="hidden group-hover:flex truncate  items-center gap-2">
                                session participent
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu3" class="hidden flex-col gap-2 group-hover:ms-5 ms-0 w-[91%]  bg-black text-white rounded-lg shadow-md transition-all duration-300">
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
    </div>
</div>



<div class="md:hidden z-50">
    <div
        class="bg-black side-bar rounded-lg text-white fixed top-[11vh] left-[-700px] w-[70vw] flex flex-col gap-2  p-5 duration-500 transition-all ">
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
        <div class="flex flex-col items-start gap-2 w-[100%] ">
            <!-- Dropdown Toggle Button -->
            <div class="w-[100%] nav-button no-underline text-base font-bold flex gap-2 items-center   py-[0.75rem] px-[1rem] bg-black text-white  rounded-xl  hover:text-alpha hover:bg-gray-800 transition-all duration-300">
                <button id="dropdownButton4" class="flex items-center gap-2 w-[100%] ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                      </svg>
                    <div class="flex truncate  items-center gap-2">
                        Articles
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                        </svg>
                    </div>
                </button>
            </div>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu4" class="hidden  flex-col gap-2 ms-5 w-[91%]  bg-black text-white rounded-lg shadow-md transition-all duration-300">
                <a href='{{ route('blogs.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('blogs.index') ? 'text-alpha bg-gray-800' : '' }} transition-all duration-300 ease-in-out'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                    <p class="block truncate">
                        Blogs
                    </p>
                </a>
                <a href='{{ route('press.index') }}'
                    class='nav-button no-underline mt-2 text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('press.index') || request()->routeIs('press.create') || request()->routeIs('press.show') ? 'text-alpha bg-gray-800' : '' }} transition-all duration-300 ease-in-out'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    <p class="block truncate">
                        Press
                    </p>
                </a>
            </div>
        </div>
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

        <div class="flex flex-col items-start gap-2 w-[100%] ">
            <!-- Dropdown Toggle Button -->
            <div class="w-[100%] nav-button no-underline text-base font-bold flex gap-2 items-center   py-[0.75rem] px-[1rem] bg-black text-white  rounded-xl hover:text-alpha hover:bg-gray-800 transition-all duration-300">
                <button id="dropdownButton5" class="flex items-center gap-2 w-[100%] ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                      </svg>
                    <div class="flex truncate  items-center gap-2">
                        Connect
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                        </svg>
                    </div>
                </button>
            </div>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu5" class="hidden flex-col gap-2 ms-5  w-[91%]  bg-black text-white rounded-lg shadow-md transition-all duration-300">
                <a href='{{ route('contacts.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('contacts.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>
                    <p class="block truncate ">
                        Contacts
                    </p>
                </a>
                <a href='{{ route('coworkings.index') }}'
                    class='nav-button no-underline mt-2 text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('coworkings.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                    <p class="block truncate ">
                        Coworking
                    </p>
                </a>
            </div>
        </div>


        <a href='{{ route('gallery.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('gallery.index') || request()->routeIs('gallery.create') || request()->routeIs('gallery.show') ? 'text-alpha bg-gray-800' : 'text-white' }}'>
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
              </svg>
            <p class=" group-hover:block truncate ">

                Gallery
            </p>
        </a>
        <a href='{{ route('newsletter.index') }}'
            class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('newsletter.index') ? 'text-alpha bg-gray-800' : 'text-white' }}'>

            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
              </svg>
            <p class=" group-hover:block truncate ">

                Newsletter
            </p>
        </a>
        <div class="flex flex-col items-start gap-2 w-[100%] ">
            <!-- Dropdown Toggle Button -->
            <div class="w-[100%] nav-button no-underline text-base font-bold flex gap-2 items-center   py-[0.75rem] px-[1rem] bg-black text-white  rounded-xl hover:text-alpha hover:bg-gray-800 transition-all duration-300">
                <button id="dropdownButton6" class="flex items-center gap-2 w-[100%] ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" class="bi bi-person-video3" viewBox="0 0 16 16">
                        <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783Q16 12.312 16 12V4a2 2 0 0 0-2-2z"/>
                      </svg>
                    <div class="flex truncate  items-center gap-2">
                        session participent
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                        </svg>
                    </div>
                </button>
            </div>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu6" class="hidden flex-col gap-2 ms-5  w-[91%]  bg-black text-white rounded-lg shadow-md transition-all duration-300">
                <a href='{{ route('infosessions.index') }}'
                    class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-800 rounded-xl px-[1rem] {{ request()->routeIs('infosessions.index') ? 'text-alpha bg-gray-800' : '' }}'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                    </svg>
                    <p class="block truncate ">
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
                    <p class="block truncate ">
                        Participants
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    const dropdownButton = document.querySelectorAll('[id^="dropdownButton"]');
    const dropdownMenu = document.querySelectorAll('[id^="dropdownMenu"]');


    dropdownButton.forEach((button)=>{
        const menuId = button.id.replace('Button', 'Menu');

        const menu = document.getElementById(menuId);

        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');

            // Close other dropdowns
            dropdownMenu.forEach((otherMenu) => {
                if (otherMenu !== menu) {
                    otherMenu.classList.add('hidden');

                }
            });
        });
    })

</script>
