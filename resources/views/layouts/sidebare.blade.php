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


<div class="w-[16vw]  h-screen bg-alpha flex flex-col py-5 justify-">
    <div class="flex flex-col w-full">
        <div class="px-[1.5rem]">
            <a href="{{ route('dashboard') }}" class="text-3xl font-bold">
                {{-- <x-application-logo color size="100" /> --}}
                LIONSGEEK
            </a>
        </div>

        <div id="nav-content" class='flex flex-col gap-[0.5rem] py-7 px-[0.5rem] relative'>
            <a href='{{ route('dashboard') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-100 rounded-xl px-[1rem] {{ request()->routeIs('dashboard') ? 'text-alpha bg-gray-100' : '' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>
                Dashboard
            </a>
            <a href='{{ route('events.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-100 rounded-xl px-[1rem] {{ request()->routeIs('events.index') ? 'text-alpha bg-gray-100' : '' }} '>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
                Events
            </a>
            <a href='{{ route('blogs.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-100 rounded-xl px-[1rem] {{ request()->routeIs('blogs.index') ? 'text-alpha bg-gray-100' : '' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                </svg>
                BLOGS
            </a>
            <a href='{{ route('contacts.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-100 rounded-xl px-[1rem] {{ request()->routeIs('contacts.index') ? 'text-alpha bg-gray-100' : '' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                </svg>
                CONTACT
            </a>
            {{--
            <a href='/messages'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-100 rounded-xl px-[1rem] {{ request()->routeIs('users.index') ? 'text-alpha bg-gray-100' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
                Messages
            </a>
            <a href='{{ route('forms.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-100 rounded-xl px-[1rem] {{ request()->routeIs('users.index') ? 'text-alpha bg-gray-100' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 13.5H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                Form
            </a>
            <a href='{{ route('admins.index') }}'
                class='nav-button no-underline text-base font-bold py-[0.75rem] flex items-center gap-2 hover:text-alpha hover:bg-gray-100 rounded-xl px-[1rem] {{ request()->routeIs('users.index') ? 'text-alpha bg-gray-100' : 'text-gray-100' }}'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                Users
            </a> --}}
        </div>
    </div>
</div>
