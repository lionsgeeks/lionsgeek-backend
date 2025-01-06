<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Update Info Session') }}
        </h2>

        {{-- <a href="{{ route('events.create') }}">
            <button
                class=" py-[0.7rem] px-[2rem] text-[16px] font-bold rounded-[10px] bg-alpha hover:bg-black hover:text-white transition
            duration-150 ">Create
                Event
            </button>
        </a> --}}
    </x-slot>
    <div class="p-10">
        
        <div class="flex gap-4">
            <div class="bg-white flex flex-col gap-5  font-bold w-1/4 px-5 py-8 shadow rounded-xl">
                <div class="flex justify-between">
                    <h1 class="text-xl">Session</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                </div>
                <p>{{ $infoSession->name }}</p>
            </div>
            <div class="bg-white flex flex-col gap-5 font-bold  w-1/4 px-5 py-8 shadow rounded-xl">
                <div class="flex justify-between">
                    <h1 class=" text-xl">Participants</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <p class="text-xl">{{ $infoSession->participants->count() }}</p>
            </div>
            <div class="bg-white flex flex-col gap-5 font-bold  w-1/4 px-2 py-8 shadow rounded-xl">
                <div class="flex justify-between">
                    <h1 class=" text-xl">Actions</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                </div>
                
            </div>
            <div class="bg-white flex flex-col gap-5 font-bold w-1/4 px-5 py-8 shadow rounded-xl">
                <div class="flex justify-between">
                    <h1 class="text-xl">Gender</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30" height="30" fill="currentColor">
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
                    $genderCounts = $infoSession->participants->groupBy('gender')->map->count();
                @endphp
                <p> <span class="text-sky-300">Males:</span>  {{ $genderCounts['male'] ?? 0 }}</p>
                <p> <span  class="text-pink-300">Females:</span>  {{ $genderCounts['female'] ?? 0 }}</p>
            </div>
            
        </div>
        <div>
            <div class="flex items-center gap-x-3 justify-end pt-12 ">
              
                
                <form action="{{ route('questions.export') }}" method="post">
                    @csrf

                        <button class="bg-black px-2 py-1 rounded text-white">
                            Export Questions
                        </button>

                </form>
                <form action='{{ route('participant.export') }}' method="post">
                    @csrf
                    <input class="hidden" type="text" name="term" id="term" :value="searchQuery">
                    <input class="hidden" type="text" name="step" id="step" :value="selectedStep">
                    <input class="hidden" type="text" name="session" id="session"
                        :value="infos && infos.length > 0 ? selectedSession : {{ $infoSession ? $infoSession->id : null }}">
                    <button class="bg-black px-2 py-1 rounded text-white ">
                        Export Students
                    </button>
                </form>
                <div class="flex justify-end gap-x-5 items-center ">
                    @include('info_session.partials.update_session_modal')
                    @include('info_session.partials.delete-session_modal')
        
                </div>
            </div>
        </div>
        @include('participants.partials.participants_table', [
            'parts' => $infoSession->participants,
            'infos' => [],
        ])
        <div class="flex items-center gap-2 m-3">
            {{-- <div class="w-[30%] bg-white p-2 rounded">
                @php
                    $totalNumber = $infoSession->participants->count();
                @endphp
                <x-gender-chart :$males :$totalNumber />
            </div> --}}
{{-- 
            <div class="w-[40%] bg-white p-2 rounded">
                <canvas id="ageChart"></canvas>
            </div> --}}
        </div>


    </div>

    <script>
        // The Age Chart
        const ageChart = document.getElementById('ageChart')
        new Chart(ageChart, {
            type: 'bar',
            data: {
                labels: ['18-20', '21-23', '24-26', '27-30'],
                datasets: [{
                    label: 'Age',
                    // count the ages of the participants
                    data: [{{ $babies }}, {{ $prime }}, {{ $late }},
                        {{ $oldies }}
                    ],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            }
        })
    </script>
</x-app-layout>
