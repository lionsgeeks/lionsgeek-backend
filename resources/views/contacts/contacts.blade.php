<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Contact Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($contacts->count() > 0)
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <form class="flex justify-end md:px-10 px-4 py-5" action="{{ route('contact.export') }}" method="post">
                        @csrf
                        <button class="bg-black text-white px-4 py-2 rounded">
                            Export Excel
                        </button>
                    </form>
                    <div class="p-6 text-gray-900 hidden md:flex">

                        <table class="w-full">
                            <thead>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                            </thead>

                            <tbody class="w-full">
                                @foreach ($contacts->reverse() as $contact)
                                    <tr class="w-full text-center h-[10vh] py-2">

                                        <td>
                                            {{ $contact->created_at->format("d-M-y") }}
                                        </td>
                                        <td>
                                            {{ $contact->full_name }}
                                        </td>
                                        <td>
                                            {{ $contact->phone }}
                                        </td>
                                        <td>
                                            {{ $contact->email }}
                                        </td>
                                        <td class="">
                                        <button onclick="openModal('contactMessage{{ $contact->id }}')" class="bg-black py-2 px-3 rounded-lg text-alpha">
                                            Read Message
                                        </button>
                                        @include("contacts.partials.contact_message_details")
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                     <!-- Mobile Card View -->
                     <div class="md:hidden space-y-4 px-2">
                        @foreach ($contacts->reverse() as $contact)
                            <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="font-medium text-gray-900">{{ $contact->full_name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $contact->created_at->format("d-M-y") }}</p>
                                    </div>
                                    <button onclick="openModal('contactMessage{{ $contact->id }}')"
                                            class="bg-black py-2 px-3 rounded-lg text-alpha text-sm">
                                        Read Message
                                    </button>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                        </svg>
                                        <span class="text-gray-600">{{ $contact->phone }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                        </svg>
                                        <span class="text-gray-600">{{ $contact->email }}</span>
                                    </div>
                                </div>
                                @include("contacts.partials.contact_message_details")
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
            <div class="h-[70vh] bg-white rounded-lg flex items-center justify-center w-full">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Messages Received</h1>
                    <p class="text-gray-500 mb-6">It seems there are no messages in your inbox yet.</p>
                    <p class="text-gray-400">Encourage visitors to reach out by checking that your contact form is accessible and easy to use.</p>
                </div>
            </div>

            @endif
        </div>
    </div>
</x-app-layout>
