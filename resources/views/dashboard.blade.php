<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto   sm:px-6 lg:px-8">
            <div class=" w-full   overflow-hidden p-4 flex flex-col gap-y-4 ">

                <div class="flex items-center justify-between ">
                    <h1 class="lg:text-3xl md:text-2xl font-bold capitalize text-gray-500">hello
                        {{ Auth::user()->name }},</h1>
                    <div>
                        <button onclick="openModal('modalAdmin')"
                            class="lg:px-6 px-2 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha  transition">
                            Add Admin
                        </button>
                        @include('layouts.AdminModal')
                        <button
                            class="lg:px-6 px-2 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha  transition">
                            <a href="{{ route('press.create') }}">Add Press</a>
                        </button>

                    </div>
                    {{-- <h1 class="text-6xl font-medium capitalize text-black/75">welcome back !</h1> --}}

                </div>
                <div
                    class="w-full grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1  gap-x-4 lg:gap-y-0 md:gap-y-2 gap-y-4 ">
                    <div
                        class=" ps-4 py-2   shadow-md bg-white  text-black flex   items-center  rounded-[16px]  gap-x-5">
                        <span class="w-[50px] h-[50px] rounded-full   bg-[#eeb76b34] relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                                class="bi bi-envelope   absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </span>
                        <div class="flex flex-col h-[50%] justify-center ">
                            <span class="font-bold text-[18px]">Total Contacts</span>
                            @if ($totalContacts > 0)
                                <p class="text-3xl font-black ">{{ $totalContacts }}</p>
                            @else
                                <p>No Messages Received</p>
                            @endif
                        </div>
                    </div>
                    <div class=" ps-4 py-2   shadow-md bg-white flex  items-center gap-x-5 rounded-[16px] ">
                        <span class="w-[50px] h-[50px] rounded-full bg-[#eeb76b34]  relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                                class="bi bi-envelope text-black absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                            </svg>
                        </span>
                        <div class="flex flex-col h-[50%] justify-center  text-black">
                            <span class="font-bold text-[18px]">Upcoming Events</span>
                            @if ($totalEvents > 0)
                                <p class="text-3xl font-black ">{{ $totalEvents }}</p>
                            @else
                                <p>there are no events yet</p>
                            @endif
                        </div>
                    </div>
                    <div class=" ps-4 py-2   shadow-md bg-white flex  items-center gap-x-5 rounded-[16px] ">
                        <span class="w-[50px] h-[50px] rounded-full  bg-[#eeb76b34] relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                                class="bi bi-envelope text-black absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                viewBox="0 0 16 16">
                                <path
                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                            </svg>
                        </span>
                        <div class="flex flex-col h-[50%] justify-center  text-black">
                            <span class="font-bold text-[18px]">Total Members</span>
                            @if ($members > 0)
                                <p class="text-3xl font-black ">{{ $members }}</p>
                            @else
                                <p>No event Available</p>
                            @endif
                        </div>
                    </div>
                    <div class=" ps-4 py-2   shadow-md bg-white flex  items-center gap-x-5 rounded-[16px]  ">
                        <span class="w-[50px] h-[50px] rounded-full bg-[#eeb76b34] relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                                class="bi bi-envelope text-black absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"
                                viewBox="0 0 16 16">
                                <path
                                    d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                            </svg>
                        </span>
                        <div class="flex flex-col justify-center h-[50%]  text-black">
                            <span class="font-bold text-[18px]">Total Visits</span>

                            <p class="text-3xl font-black">{{ $views?->views ?? 0 }}</p>

                        </div>
                    </div>


                </div>
                @if ($notReadedMessages->count() > 0)
                    <div class="lg:p-6 p-3 bg-white rounded-[16px] shadow-md">
                        <div class="w-full flex flex-col gap-y-3">
                            <div class="flex items-center gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#ffc803" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                                <div class="flex justify-between items-center w-full">
                                    <h1 class="text-xl font-bold ">Recent Messages</h1>


                                    <a href="{{ route('contacts.index') }}"
                                        class="text-alpha text-[18px] cursor-pointer underline">
                                        view messages</a>

                                </div>
                            </div>
                                {{-- <div x-on:click='id = {{ $key }}'
                                    class="flex bg-yellow-400  justify-between p-2 border-b-[1.6px]">
                                    <div class="flex gap-x-2 bg-black ">
                                        <p class="bg-red-400">{{ $message->full_name }}</p>
                                        <p class="bg-red-400 truncate border-r-[1.2px] pe-2 ">{{ $message->message }}</p>
                                    </div>
                                    <span
                                        class="w-[20%] text-[#6c757d]">{{ $message->created_at->format('F j, Y') }}</span>

                                </div> --}}

                                <table class="w-full">
                                    <thead class="">
                                        <th class="lg:table-cell hidden">Name</th>
                                        <th class="lg:table-cell hidden">Email</th>
                                        <th>Message</th>
                                        <th >Date</th>
                                    </thead>

                                    <tbody class="w-full ">
                                        @foreach ($notReadedMessages->reverse() as $key => $contact)
                                            <tr  class="w-full text-center h-[5vh]  border-t  {{  $key % 2 == 0 ? '' : 'bg-gray-100' }} ">

                                                <td  class="truncate lg:table-cell hidden">
                                                    {{ $contact->full_name }}
                                                </td>
                                                <td class="lg:table-cell hidden">
                                                    {{ $contact->email }}
                                                </td>
                                               
                                                
                                                <td class="">
                                                   <p >
                                                    {{ Str::limit($contact->message, 15, '...') }}
                                                   </p>
                                                </td>
                                                <td >
                                                    {{ $contact->created_at->format('d M,y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>



                        </div>
                    </div>

                @endif
                <div class="">
                    @if ($sessions->count() > 0)
                        <div class="p-4 shadow-md rounded-[16px] flex flex-col gap-y-4 bg-white ">
                            <h1 class="text-xl font-semibold text-black ">Upcoming Info Sessions</h1>
                            <div class="grid  mt-2 lg:grid-cols-4 lg:gap-x-2 md:gap-x-4 grid-cols-2 gap-x-4 gap-y-8 ">
                                @foreach ($sessions as $session)
                                    <div class="flex  items-center gap-x-2  ">
                                        <div
                                            class="flex flex-col   items-center justify-center w-12 h-12  border rounded-md  shadow-sm">
                                            <div
                                                class="text-xs font-bold bg-gray-400 w-full text-center rounded-se-md rounded-ss-md ">
                                                {{ \Carbon\Carbon::parse($session->start_date)->format('M') }}</div>
                                            <div class="text-2xl font-bold text-gray-900">
                                                {{ \Carbon\Carbon::parse($session->start_date)->format('d') }}</div>
                                        </div>
                                        <div class="flex flex-col ">
                                            <h1
                                                class="font-bold  {{ $session->formation == 'Coding' ? 'bg-[#ffc80155] border-[#ffc801e2]' : '' }} {{ $session->formation == 'Media' ? 'bg-[#6ad86451] border-[#3f6b6e]' : '' }} px-2 border border-[#ffc801e2] text-center rounded-full">
                                                {{ $session->formation }}</h1>
                                            <h2 class="text-sm font-medium truncate text-[#919391]">
                                                {{ $session->name }}</h2>
                                        </div>


                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endif

                </div>

                <div class="w-ful grid lg:grid-cols-2 grid-cols-1 gap-x-4 lg:gap-y-0 gap-y-4 ">
                    <div class=" h-[40vh] shadow-md rounded-[16px] bg-white ">
                        @if ($pendingCoworkings->count() > 0)
                            <div x-data='{
                        cows: {{ $pendingCoworkings }},
                        searchQuery: "",
                        matchesSearch(cow) {
                            const query = this.searchQuery.toLowerCase();
                            return cow.full_name.toLowerCase().includes(query) ||
                                cow.email.toLowerCase().includes(query) ||
                                cow.phone.toLowerCase().includes(query);},
                        matchesFilter(participant) {
                                return this.matchesSearch(participant);},

                    }'
                                class=" overflow-hidden  sm:rounded-lg">

                                <div class="p-6 text-gray-900 ">
                                    <div class="flex justify-between items-center">
                                        <h1 class="text-xl font-semibold text-black mb-2">Recent Coworking Requests</h1>
                                        <a href="{{ route('coworkings.index') }}" class="underline text-alpha">See
                                            all</a>
                                    </div>
                                    <table class="w-full mt-4">
                                        <thead class="border-b">
                                            <th class=" ">Name</th>
                                            {{-- <th class=" sm:table-cell hidden">Phone</th> --}}
                                            {{-- <th class=" sm:table-cell hidden">Email</th> --}}
                                            <th class=" sm:table-cell hidden">Date</th>
                                            <th class=" ">Full Detail</th>
                                            <th class=" ">Action</th>
                                        </thead>

                                        <tbody class="w-full">
                                            <template x-for="cow in cows" :key="cow.id">
                                                <tr x-show="matchesFilter(cow)"
                                                    class="w-full text-center h-[7vh] align-middle border-b">
                                                    <td class="" x-text="cow.full_name"></td>
                                                    {{-- <td class="sm:table-cell hidden" x-text="cow.phone"></td> --}}
                                                    {{-- <td class="sm:table-cell hidden" x-text="cow.email"></td> --}}
                                                    <td class="sm:table-cell hidden"
                                                        x-text="new Date(cow.created_at).toLocaleDateString()"></td>
                                                    <td class="">
                                                        <a :href="'/coworkings/' + cow.id">
                                                            <button
                                                                class="p-1 bg-white text-black hover:bg-alpha hover:text-black transition-all duration-200 ease-out rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                            </button>
                                                        </a>

                                                    </td>
                                                    <td class="">
                                                        <div class=" flex justify-center">
                                                            <template x-if="!cow.status">
                                                                {{-- reject/approve form --}}
                                                                <form method="POST"
                                                                    :action="`{{ route('coworkings.update', '') }}/${cow.id}`"
                                                                    class="flex items-center justify-center  gap-x-2 mt-2">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="border p-1 rounded-md"
                                                                        type="submit" name="action" value="reject">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-x-lg text-red-500"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                                                        </svg>
                                                                    </button>
                                                                    <button
                                                                        class="bg-[#356966] text-black lg:px-2 p-1 rounded-md "
                                                                        type="submit" name="action"
                                                                        value="approve">
                                                                        <span class="lg:block hidden">Approve</span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-check-circle text-black lg:hidden block"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                            <path
                                                                                d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </template>
                                                            <template x-if="cow.status == 1">
                                                                <button
                                                                    class="bg-[#f3f8f0] cursor-none text-black lg:rounded-full  flex items-center gap-x-2 lg:px-2 lg:py-0.5 lg:border border-green-900">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-check-circle text-green-900 "
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                        <path
                                                                            d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                                    </svg>
                                                                    <span class="lg:block hidden">Approved</span>
                                                                </button>
                                                            </template>
                                                            <template x-if="cow.status == 2">
                                                                <button
                                                                    class="bg-[#fef8f5] cursor-none text-black rounded-full  flex items-center gap-x-2 lg:px-2 lg:py-0.5 lg:border border-red-500">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="bi bi-x-circle text-red-500"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                        <path
                                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                                    </svg> <span
                                                                        class="lg:block hidden">Rejected</span>
                                                                </button>
                                                            </template>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class=" bg-white  h-full rounded-[16px] flex items-center justify-center w-full">
                                <div class="text-center">
                                    <h1 class="text-2xl font-semibold text-black mb-3">No Pending Requests</h1>
                                    <p class="text-gray-600 mb-6">Currently, there are no pending requests to join the
                                        coworking space.</p>

                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="h-[40vh]  bg-white shadow-md  rounded-[16px]">
                        @if ($upcomingEvents->count() > 0)
                            <div class=" overflow-hidden  sm:rounded-lg">

                                <div class="p-6 text-gray-900 ">
                                    <div class="flex justify-between items-center">
                                        <h1 class="text-xl font-semibold text-black mb-2">Upcoming Events</h1>
                                        <a href="{{ route('events.index') }}" class="underline text-alpha">See
                                            all</a>
                                    </div>
                                    <table class="w-full mt-4">
                                        <thead class="border-b">
                                            <th class=" ">Event</th>
                                            <th class=" sm:table-cell hidden">Date</th>
                                            <th class=" ">Time</th>
                                            <th class=" ">Full Detail</th>
                                        </thead>

                                        <tbody class="w-full">
                                            @foreach ($upcomingEvents as $event)
                                                <tr class="w-full text-center h-[7vh] align-middle border-b">
                                                    <td class="">{{ $event->name->en }}</td>
                                                    <td class="sm:table-cell hidden">
                                                        {{ Str::substr($event->date, 0, 10) }}</td>
                                                    <td class="sm:table-cell">
                                                        {{ Str::substr($event->date, 11, 5) }}</td>
                                                    <td class="">
                                                        <a href="/events/{{ $event->id }}">
                                                            <button
                                                                class="p-1 bg-white text-black hover:bg-alpha hover:text-black transition-all duration-200 ease-out rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                            </button>
                                                        </a>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="h-[100%] bg-white flex rounded-[16px] items-center justify-center w-full">
                                <div class="text-center">
                                    <h1 class="text-2xl font-semibold text-gray-700 mb-3">No event Available</h1>
                                    <p class="text-gray-500 mb-6">It looks like there aren’t any events created yet.
                                    </p>
                                    <a href="{{ route('events.create') }}">
                                        <button
                                            class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                            Create a new Event
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="w-full  flex flex-col gap-y-2 bg-white p-4 rounded-[16px]">

                    @if ($blogs->count() > 0)

                        <div class="flex justify-between items-center ">
                            <h1 class="text-xl font-semibold text-black ">Latest Blogs</h1>
                            <a href="{{ route('blogs.index') }}" class="underline text-alpha">See all</a>
                        </div>
                        <div class=" grid lg:grid-cols-4 md:grid-cols-2 gap-x-4  p-4 rounded-[16px] gap-y-4 ">
                            @foreach ($blogs as $blog)
                                <div class=" flex flex-col gap-y-2">
                                    <div class="h-[20vh]">
                                        <img class="w-[90%] aspect-video object-cover rounded-[16px] h-full"
                                            src="{{ asset('storage/images/' . $blog->image) }}" alt="">
                                    </div>
                                    <div class="flex flex-col gap-y-1">
                                        <h1 class="text-xl truncate   rounded-full">
                                            {{ $blog->title->en }}</h1>
                                        <div
                                            class="flex  items-center gap-x-1 w-fit px-2 bg-alpha/10 border border-[#eeb76b34] rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                            </svg>
                                            <p class="">Written By <span
                                                    class="font-bold text-[18px]">{{ $blog->user?->name }}</span></p>
                                        </div>
                                    </div>




                                </div>
                            @endforeach
                        </div>

                </div>
            @else
                <div class="h-[40vh] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Blogs Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any blogs published yet.</p>
                        <a href="{{ route('blogs.create') }}">
                            <button
                                class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                Write a New Blog
                            </button>
                        </a>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
