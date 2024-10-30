<div class="w-[16vw] h-[100vh] flex flex-col items-center gap-10 bg-[#fef819] ">
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
        <button
            class="w-[100%] py-[.8rem] rounded-[14px] bg-white text-black hover:bg-black hover:text-white transition duration-150 "><a
                class="" href="">More</a></button>
    </div>
</div>