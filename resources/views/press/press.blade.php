<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Press') }}
        </h2>

    </x-slot>
    <div class="py-12 md:px-10 px-4">
        <div class=" {{ $presses->count() == 0 ? 'h-[70vh]' : 'min-h-[70vh]' }} bg-white rounded-lg p-6  w-[100%] px-8 ">
            <div class="flex justify-end">
                <a href="{{ route('press.create') }}">
                    <button
                        class="{{ $presses->count() == 0 ? 'hidden' : '' }} bg-black text-white rounded-lg px-4 py-2 hover:bg-alpha hover:text-black  transition duration-150">
                        Create a Press
                    </button>
                </a>
            </div>
            @if ($presses->count() == 0)
                <div class="h-[100%] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No press Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any press created yet.</p>
                        <a href="{{ route('press.create') }}">
                            <button
                                class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                Create a new press
                            </button>
                        </a>
                    </div>
                </div>
            @endif
            <div class="md:flex hidden flex-wrap gap-x-[calc(5%/2)] gap-y-4  ">
                @foreach ($presses as $press)
                    <div
                        class=" w-[calc(95%/3)] text-nowrap flex flex-col overflow-hidden  gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  bg-[#f9f9f9]">
                        <img class="w-[100%] h-[12rem] object-cover rounded-[16px] "
                            src="{{ asset('storage/images/press/' . $press->cover) }}" alt="">
                        <div class="w-full flex items-center justify-between">
                            <img class="rounded-full aspect-square w-[35px]" src="{{ asset('storage/images/press/' . $press->logo) }}" alt="">
                            <h4 class="text-[20px] font-semibold truncate w-52 ">{{ $press->name->en }}
                            </h4>
                            <a href="{{ route('press.show', $press->id) }}">
                                <button class="py-[.5rem] px-[1.5rem] rounded-lg bg-black text-white " type="button">
                                    See press
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="md:hidden flex flex-wrap gap-4">
                @foreach ($presses as $press)
                    <div
                        class="flex flex-col overflow-hidden gap-3 rounded-[16px] bg-[#f9f9f9] p-3 w-full sm:w-[calc(50%-1rem)]">
                        <img class="w-full aspect-video object-cover rounded-[16px]"
                            src="{{ asset('storage/images/press/' . $press->cover) }}" alt="">
                        <div class="space-y-3">
                            <h4 class="text-lg font-semibold">{{ $press->name->en }}</h4>
                            <a href="{{ route('press.show', $press->id) }}" class="block">
                                <button class="w-full py-2 px-4 rounded-lg bg-black text-white text-sm" type="button">
                                    See press
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
