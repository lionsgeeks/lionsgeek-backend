<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coworking Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                    <div class="p-6 text-gray-900">

                        <div class="flex items-center justify-between mb-4">
                            <div class="w-1/3 flex items-center bg-gray-100 rounded-lg pl-2">
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
                                <button class="bg-black text-white px-4 py-2 rounded">
                                    Export Excel
                                </button>
                            </form>
                        </div>

                        <table class="w-full">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Full Detail</th>
                            </thead>

                            <tbody class="w-full">
                                <template x-for="cow in cows" :key="cow.id">
                                    <tr x-show="matchesFilter(cow)" class="w-full text-center h-[7vh]">
                                        <td x-text="cow.full_name"></td>
                                        <td x-text="cow.phone"></td>
                                        <td x-text="cow.email"></td>
                                        <td x-text="new Date(cow.created_at).toLocaleDateString()"></td>
                                        <td>
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
