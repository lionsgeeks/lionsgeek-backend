<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($contacts->count() > 0)
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

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
