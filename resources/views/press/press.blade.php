<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Press') }}
        </h2>

    </x-slot>
    <div class="pt-12 md:px-10 px-4">
        <div
        :class="darkmode ? 'bg-dark text-white' : 'bg-white'"
            class=" {{ $presses->count() == 0 ? 'h-[76vh]' : 'min-h-[76vh]' }} mb-3 rounded-lg p-6  w-[100%] px-8 ">
            <div class="flex justify-end">
                <a href="{{ route('press.create') }}" class="lg:mr-0 md:mr-7">
                    <button
                        :class="darkmode ? 'bg-alpha text-black hover:opacity-75' :
                            'bg-black text-white hover:bg-alpha hover:text-black'"
                        class="{{ $presses->count() == 0 ? 'hidden' : '' }}  rounded-lg px-4 py-2 font-bold  transition duration-150">
                        Create a Press
                    </button>
                </a>
            </div>
            @if ($presses->count() == 0)
                <div class="h-[100%] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No press Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any press created yet.</p>
                        <a href="{{ route('press.create') }}" class="lg:mr-0 md:mr-36">
                            <button
                                class="px-6 py-2 bg-black text-white md:mr-20 text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                Create a new press
                            </button>
                        </a>
                    </div>
                </div>
            @endif
            <div class="md:flex hidden md:pt-9 flex-wrap gap-x-[calc(5%/2)] gap-y-4  ">
                @foreach ($presses as $press)
                    <div
                    :class="darkmode ? 'bg-deep' : 'bg-[#f9f9f9]'"
                        class=" lg:w-[calc(95%/3)] text-nowrap flex flex-col md:w-64 overflow-hidden gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  ">
                        <img class="w-[100%] h-[12rem] object-cover rounded-[16px] "
                            src="{{ asset('storage/images/press/' . $press->cover) }}" alt="">
                        <div class="w-full flex items-center justify-between">
                            <img class="rounded-full aspect-square w-[35px]"
                                src="{{ asset('storage/images/press/' . $press->logo) }}" alt="">
                            <h4 class="lg:text-[20px] md:text-[15px] md:pl-2 font-semibold truncate w-52 ">
                                {{ $press->name->en }}
                            </h4>
                            <a href="{{ route('press.show', $press->id) }}" class="md:pl-3">
                                <button
                                :class="darkmode ? 'bg-alpha text-black' : 'bg-black text-white'"
                                    class="lg:py-[.5rem] lg:px-[1.5rem] md:px-3 md:py-1 lg:text-base md:text-sm rounded-lg hover:opacity-75 "
                                    type="button">
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
