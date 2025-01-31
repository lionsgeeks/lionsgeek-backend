<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight ">
            {{ __('Gallery') }}


        </h2>

        {{--
        @endif
        @include('project.partials.create_project') --}}
    </x-slot>


    <div class="pt-12 px-4 lg:px-10">
        <div :class="darkmode ? 'bg-dark text-white' : 'bg-white'"
            class="flex-row-reverse justify-between flex min-h-[76vh] mb-3 p-6 flex-wrap gap-x-[calc(5%/3)] gap-y-4 w-[100%] rounded-lg ">
            @if ($galleries->count() == 0)
                <div class="h-[100%] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No gallery Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any gallery created yet.</p>
                        <a href="{{ route('gallery.create') }}">
                            <button
                                :class="darkmode ? 'bg-alpha text-black hover:opacity-75' :
                                    'bg-black text-white hover:bg-alpha hover:text-black'"
                                class="px-6 py-2  text-base font-medium rounded-md shadow  transition">
                                Create a new Gallery
                            </button>
                        </a>
                    </div>
                </div>
            @endif

            <div class="w-full flex gap-6 overflow-y-auto flex-wrap ">
                @if ($galleries->count() > 0)
                    <x-creation-card route="gallery.create" label="Gallery" />
                @endif

                @foreach ($galleries as $key => $gallery)
                    <div :class="darkmode ? 'bg-deep' : 'bg-[#f9f9f9]'"
                        class=" lg:w-[calc(95%/3)] md:w-[calc(95%/2)] w-full  text-nowrap flex flex-col overflow-hidden  gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  ">
                        <img class="w-[100%] h-[12rem] object-cover rounded-[16px] "
                            src="{{ asset('storage/images/gallery/' . $gallery->couverture) }}" alt="">
                        <div class="w-full flex flex-row  items-center justify-between">
                            <h4 class="lg:text-[20px] text-[15px] font-semibold ">
                                {{ Str::limit($gallery->title->en, 15, '...') }}</h4>
                            <a href="{{ route('gallery.show', $gallery->id) }}">
                                <button :class="darkmode ? 'bg-alpha text-black' : 'bg-black text-white'"
                                    class="lg:py-2 py-1 px-4 rounded-lg  lg:text-base text-sm  hover:opacity-75"
                                    type="button">
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
