<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coworking Requests') }}
        </h2>
    </x-slot>

    <div class="py-12 sm:px-0 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            @if ($coworkings->count() > 0)
                <div x-data='{
                    cows: {{ $coworkings }},
                    searchQuery: "",
                    matchesSearch(cow) {
                        const query = this.searchQuery.toLowerCase();
                        return cow.full_name.toLowerCase().includes(query) ||
                            cow.email.toLowerCase().includes(query) ||
                            cow.phone.toLowerCase().includes(query);},
                    matchesFilter(participant) {
                            return this.matchesSearch(participant);},

                }'
                    class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">

                        <div class="flex items-center justify-between mb-4">
                            <div class="sm:w-1/3 flex items-center bg-gray-100 rounded-lg pl-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <input x-model="searchQuery" placeholder="Name, Email or Phone" type="search"
                                    name="search" id="search"
                                    class="border-none bg-transparent w-full outline-none focus:border-none focus:ring-0 focus:outline-none text-sm">
                            </div>

                            <form action="{{ route('coworking.export') }}" method="post">
                                @csrf
                                <button class="bg-black text-white px-4 py-2   rounded add-respo">
                                    Export Excel
                                </button>
                            </form>
                        </div>

                        <table class="w-full ">
                            <thead class="">
                                <th class=" ">Name</th>           
                                <th class=" sm:table-cell hidden">Phone</th>
                                <th class=" sm:table-cell hidden">Email</th>
                                <th class=" sm:table-cell hidden">Date</th>
                                <th class=" ">Full Detail</th>
                                <th class=" ">Action</th>
                            </thead>

                            <tbody class="w-full">
                                <template x-for="cow in cows" :key="cow.id">
                                    <tr x-show="matchesFilter(cow)" class="w-full text-center h-[7vh] align-middle ">
                                        <td class="" x-text="cow.full_name"></td>
                                        <td class="sm:table-cell hidden" x-text="cow.phone"></td>
                                        <td class="sm:table-cell hidden" x-text="cow.email"></td>
                                        <td class="sm:table-cell hidden" x-text="new Date(cow.created_at).toLocaleDateString()"></td>
                                        <td class="">
                                            <a :href="'/coworkings/' + cow.id">
                                                <button
                                                    class="p-1 bg-black text-white hover:bg-alpha hover:text-black transition-all duration-200 ease-out rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                </button>
                                            </a>
                
                                        </td>
                                        <td class="" >
                                            <div class=" flex justify-center">
                                                <template x-if="!cow.status" >
                                                        {{-- reject/approve form --}}
                                                        <form method="POST" :action="`{{ route('coworkings.update', '') }}/${cow.id}`" class="flex items-center justify-center  gap-x-2 mt-2">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="border p-1 rounded-md"  type="submit" name="action" value="reject">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-red-500" viewBox="0 0 16 16">
                                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                                </svg>
                                                            </button>
                                                            <button class="bg-[#356966] text-white lg:px-2 p-1 rounded-md " type="submit" name="action" value="approve">
                                                                <span class="lg:block hidden">Approve</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-white lg:hidden block" viewBox="0 0 16 16">
                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                                                  </svg> 
                                                            </button>
                                                        </form>
                                                </template>
                                                <template x-if="cow.status == 1">
                                                        <button class="bg-[#f3f8f0] cursor-none text-black lg:rounded-full  flex items-center gap-x-2 lg:px-2 lg:py-0.5 lg:border border-green-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-green-900 " viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                                              </svg> 
                                                              <span class="lg:block hidden">Approved</span>
                                                        </button>
                                                </template>
                                                <template x-if="cow.status == 2">
                                                        <button class="bg-[#fef8f5] cursor-none text-black rounded-full  flex items-center gap-x-2 lg:px-2 lg:py-0.5 lg:border border-red-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle text-red-500" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                              </svg> <span class="lg:block hidden">Rejected</span>
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
                <div class="h-[70vh] bg-white rounded-lg flex items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Membership Requests</h1>
                        <p class="text-gray-500 mb-6">Currently, there are no requests to join the coworking space.</p>
                        <p class="text-gray-400">Make it easy for potential members to inquire by ensuring your sign-up
                            form is accessible and inviting.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
