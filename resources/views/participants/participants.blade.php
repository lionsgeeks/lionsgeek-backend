<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>

    <div class="sm:px-6 lg:px-8">
{{--
        <div class="bg-white w-[30%] mt-3 rounded p-2">
            @php
                $totalNumber = $participants->count();
            @endphp
            <x-gender-chart :$males :$totalNumber />
        </div> --}}



        @include('participants.partials.participants_table', [
            'parts' => $participants,
            'infoSession' => null,
        ])
    </div>

</x-app-layout>
