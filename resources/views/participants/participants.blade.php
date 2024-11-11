<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Things to add:</p>
                    <p> Search by name, phone, email, city.</p>
                    <p>select filter for current step</p>
                    <p>Count of number of participants</p>

                    <table class="w-full">
                        <thead>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Current Step</th>
                        </thead>

                        <tbody class="w-full">
                            @foreach ($participants as $participant)
                                <tr class="w-full text-center h-[5vh]">

                                    <td>
                                        {{ $participant->first_name }}
                                        {{ $participant->last_name }}
                                    </td>
                                    <td>
                                        {{ $participant->phone }}
                                    </td>
                                    <td>
                                        {{ $participant->email }}
                                    </td>
                                    <td>
                                        {{ $participant->birthday }}
                                    </td>
                                    <td class="capitalize">
                                        {{ str_replace("_", " ", $participant->current_step) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
