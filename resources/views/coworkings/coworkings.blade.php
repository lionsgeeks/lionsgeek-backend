<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coworking Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($coworkings->count() > 0)
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                {{-- TODO: add search feature by name, email, phone, --}}
                {{-- <input type="search" name="search" id="search" placeholder="Search..." class="rounded ml-3 mt-3"> --}}
                <div class="p-6 text-gray-900">
                    <table class="w-full">
                        <thead>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Full Detail</th>
                        </thead>

                        <tbody class="w-full">
                            @foreach ($coworkings as $coworking)
                                <tr class="w-full text-center h-[7vh]">

                                    <td>
                                        {{ $coworking->full_name }}
                                    </td>
                                    <td>
                                        {{ $coworking->phone }}
                                    </td>
                                    <td>
                                        {{ $coworking->email }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($coworking->created_at)->format('F j, Y') }}
                                    </td>

                                    <td>

                                        <a href="{{ route('coworkings.show', $coworking) }}">
                                            <button
                                                class=" p-1 bg-black text-white hover:bg-alpha hover:text-black transition-all duration-200 ease-out rounded">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @else
            <div class="h-[70vh] bg-white rounded-lg flex items-center justify-center w-full">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Membership Requests</h1>
                    <p class="text-gray-500 mb-6">Currently, there are no requests to join the coworking space.</p>
                    <p class="text-gray-400">Make it easy for potential members to inquire by ensuring your sign-up form is accessible and inviting.</p>
                </div>
            </div>            
            @endif
        </div>
    </div>
</x-app-layout>
