<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Events') }}
        </h2>

    </x-slot>
    
    <div class="md:pt-12 p-12 md:px-10 px-4">
        
        <div class=" {{ $events->count() == 0 ? 'h-[76vh]' : 'min-h-[76vh]' }} bg-white rounded-lg p-6  w-[100%] px-8 ">
            <div class="flex justify-end mb-6">

                <a href="{{ route('events.create') }}">
                    <button
                        class="{{ $events->count() == 0 ? 'hidden' : '' }} text-white bg-black  hover:bg-alpha hover:text-black font-bold rounded-lg px-4 py-2   transition duration-150">
                        <span class="text-lg font-bold">+</span> Create a New Event
                    </button>
                </a>
            </div>
            @if ($events->count() == 0)
                <div class="h-[100%] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No event Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any events created yet.</p>
                        <a href="{{ route('events.create') }}">
                            <button
                                class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                Create a new Event
                            </button>
                        </a>
                    </div>
                </div>
            @endif
            <div class="md:flex hidden flex-wrap gap-x-[calc(5%/2)] gap-y-4   ">
                @foreach ($events as $event)
                    {{-- <div
                        class="w-[calc(95%/4)] flex flex-col overflow-hidden text-nowrap gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  bg-[#f9f9f9]">
                        <img class="w-[100%] h-[8rem] rounded-[16px] "
                            src="{{ asset('storage/images/' . $event->cover) }}" alt="">
                        <div class="">
                            <p class="text-[18px] font-bold ">{{ Str::limit($event->name->en, 15, '...') }}</p>
                            <p class="text-[13px] font-semibold text-gray-400">
                                {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
                        </div>
                        <a href="{{ route('events.show', $event->id) }}">
                            <button class="py-[.5rem] px-[1.5rem] rounded-lg bg-black text-white " type="button">
                                See Event
                            </button>
                        </a>
                    </div> --}}
                    <div
                        class=" lg:w-[calc(95%/3)] md:w-[calc(95%/2)] text-nowrap flex flex-col overflow-hidden  gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  bg-[#f9f9f9]">
                        <img class="w-[100%] h-[12rem] object-cover rounded-[16px] "
                            src="{{ asset('storage/images/events/' . $event->cover) }}" alt="">
                        <div class="w-full flex items-center justify-between">

                            <h4 class="lg:text-[20px] text-[15px] font-semibold ">{{ Str::limit($event->name->en, 15, '...') }}
                            </h4>
                            <a href="{{ route('events.show', $event->id) }}">
                                <button class="lg:py-2 py-1 px-4 lg:text-base text-sm rounded-lg bg-black text-white " type="button">
                                    Event Details
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Mobile Grid -->
            <div class="md:hidden flex flex-wrap gap-4">
                @foreach ($events as $event)
                    <div class="flex flex-col overflow-hidden gap-3 rounded-[16px] bg-[#f9f9f9] p-3 w-full sm:w-[calc(50%-1rem)]">
                        <img class="w-full aspect-video object-cover rounded-[16px]"
                                src="{{ asset('storage/images/events/' . $event->cover) }}"
                                alt="">
                        <div class="space-y-3">
                            <h4 class="text-lg font-semibold">{{ Str::limit($event->name->en, 15, '...') }}</h4>
                            <a href="{{ route('events.show', $event->id) }}" class="block">
                                <button class="w-full py-2 px-4 rounded-lg bg-black text-white text-sm" type="button">
                                    Event details
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
