@props(['route', 'label'])


<a href="{{ route($route) }}" :class="darkmode ? 'bg-deep' : 'bg-[#f9f9f9]'"
    class="group lg:w-[calc(95%/3)] md:w-[calc(95%/2)] w-full border-2 border-dashed text-nowrap flex flex-col overflow-hidden gap-3 px-[1rem] py-[1rem] rounded-[16px] justify-center items-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-10 group-hover:animate-bounce">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>

    <p class="font-semibold text-lg group-hover:animate-bounce capitalize">Create {{$label}}</p>
</a>
