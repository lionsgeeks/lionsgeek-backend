@extends('layouts.index')


@section('content')
    <div class=" flex">
        @include('layouts.sidebare')
        
        <div class="flex flex-col w-[84vw] h-[100vh] overflow-y-scroll">
            <div class="flex items-center justify-between py-[1.2rem] px-[1rem] w-[100%] bg-white  ">
                <p class="text-[25px] font-bold ">All Events</p>
                <div class="">
                    <button
                        class=" py-[0.7rem] px-[2rem] text-[16px] font-bold rounded-[10px] bg-[#fef819] hover:bg-black hover:text-white transition duration-150 "><a
                            href="{{ route('events.create') }}">Create Event</a></button>
                </div>
            </div>

            <div class="bg-slate-100 p-[2rem] gap-[1.6rem] flex flex-wrap  overflow-y-scroll h-[100%] w-[100%]">            
                @foreach ($events as $event)
                    <div class="w-[23%] flex flex-col gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  bg-[#f9f9f9]">
                        <img class="w-[100%] h-[8rem] rounded-[16px] " src="{{ asset('storage/images/' . $event->cover) }}"
                            alt="">
                        <div class="">
                            <p class="text-[18px] font-bold ">{{ $event->name->en }}</p>
                            <p class="text-[13px] font-semibold text-gray-400">
                                {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
                        </div>
                        <a href="{{ route('events.show',$event->id) }}"><button type="button">See Event</button></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
