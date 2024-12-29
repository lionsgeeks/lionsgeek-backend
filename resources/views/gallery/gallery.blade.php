<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight ">
            {{ __('Gallery') }}


        </h2>

        {{--
        @endif
        @include('project.partials.create_project') --}}
    </x-slot>


    <div class="pt-12 px-10">
        <div
            class="flex-row-reverse justify-between flex {{ $galleries->count() == 0 ? 'h-[76vh]' : 'max-h-[76vh]' }} overflow-y-auto p-6 flex-wrap gap-x-[calc(5%/3)] gap-y-4 w-[100%] bg-white rounded-lg ">
            @if ($galleries->count() == 0)
                <div class="h-[100%] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No gallery Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any gallery created yet.</p>
                        <a href="{{ route('gallery.create') }}">
                            <button
                                class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                Create a new Gallery
                            </button>
                        </a>
                    </div>
                </div>
            @endif
            <div class="flex justify-end">
                <a href="{{ route('gallery.create') }}">
                    <button
                        class=" py-[0.7rem] px-[2rem] text-[16px] {{ $galleries->count() == 0 ? 'hidden' : '' }} font-bold rounded-[10px] bg-black text-white transition duration-150 hover:bg-alpha hover:text-black">
                        Create Gallery
                    </button>
                </a>
            </div>
            <div class="w-full flex gap-6 overflow-y-auto flex-wrap">
                @foreach ($galleries as $gallery)
                 
                    <div
                        class=" w-[calc(95%/3)] text-nowrap flex flex-col overflow-hidden  gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  bg-[#f9f9f9]">
                        <img class="w-[100%] h-[12rem] object-cover rounded-[16px] "
                            src="{{ asset('storage/images/gallery/' . $gallery->couverture) }}" alt="">
                        <div class="w-full flex items-center justify-between">

                            <h4 class="text-[20px] font-semibold ">{{ Str::limit($gallery->title->en, 15, '...') }}</h4>
                            <a href="{{ route('gallery.show', $gallery->id) }}">
                                <button class="py-[.5rem] px-[1.5rem] rounded-lg bg-black text-white " type="button">
                                    See Gallery
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</x-app-layout>
