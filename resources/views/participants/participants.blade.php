<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>

    <div class="sm:px-6 lg:px-8">

        @include('participants.partials.participants_table', [
            'parts' => $participants,
            'infoSession' => null,
        ])
    </div>

</x-app-layout>
