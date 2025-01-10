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

        {{-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mt-6">


            <div class="bg-white flex flex-col  gap-5 font-bold  px-5 py-8 shadow rounded-xl">
                <div class="flex justify-between items-center">
                    <h1 class=" text-xl">Participants</h1>
                    <p>{{ $participants->count() }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <div class="grid grid-cols-2">
                    <p>Interview: {{ $participants->where('current_step', 'interview')->count() }}</p>
                    <p>Failed: {{ $participants->where('current_step', 'interview_failed')->count() }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Jungle: {{ $participants->where('current_step', 'jungle')->count() }}</p>
                    <p>Failed: {{ $participants->where('current_step', 'jungle_failed')->count() }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Pending: {{ $participants->where('current_step', 'interview_pending')->count() }}
                    </p>
                    <p>School: {{ $participants->where('current_step', 'like', '%school%')->count() }}</p>
                </div>
            </div>

            <div class="bg-white flex flex-col gap-5 font-bold px-5 py-8 shadow rounded-xl">
                <div class="flex justify-between">
                    <h1 class="text-xl">Gender</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30" height="30"
                        fill="currentColor">
                        <circle cx="20" cy="12" r="6" fill="#4A90E2" />
                        <rect x="16" y="20" width="8" height="18" rx="2" fill="#4A90E2" />
                        <rect x="14" y="38" width="4" height="12" rx="2" fill="#4A90E2" />
                        <rect x="22" y="38" width="4" height="12" rx="2" fill="#4A90E2" />

                        <circle cx="44" cy="12" r="6" fill="#E94E77" />
                        <rect x="40" y="20" width="8" height="14" rx="2" fill="#E94E77" />
                        <path d="M40 34 L48 34 L44 50 Z" fill="#E94E77" />
                        <rect x="38" y="38" width="4" height="12" rx="2" fill="#E94E77" />
                        <rect x="48" y="38" width="4" height="12" rx="2" fill="#E94E77" />
                    </svg>

                </div>
                @php
                    $genderCounts = $participants->groupBy('gender')->map->count();
                @endphp
                <p> <span class="text-sky-300">Males:</span> {{ $genderCounts['male'] ?? 0 }}</p>
                <p> <span class="text-pink-300">Females:</span> {{ $genderCounts['female'] ?? 0 }}</p>
            </div>

        </div> --}}

        @include('participants.partials.participants_table', [
            'parts' => $participants,
            'infoSession' => null,
        ])
    </div>

</x-app-layout>
