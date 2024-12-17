<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Info Session') }}
        </h2>

        {{-- <a href="{{ route('events.create') }}">
            <button
                class=" py-[0.7rem] px-[2rem] text-[16px] font-bold rounded-[10px] bg-alpha hover:bg-black hover:text-white transition
            duration-150 ">Create
                Event
            </button>
        </a> --}}
        @include('info_session.partials.delete-session_modal')
    </x-slot>
    <div class="p-10">

        <div class="flex items-center gap-2 mb-3">
            <div class="w-[30%] bg-white p-2 rounded">
                @php
                    $totalNumber = $infoSession->participants->count();
                @endphp
                <x-gender-chart :$males :$totalNumber />
            </div>

            <div class="w-[40%] bg-white p-2 rounded">
                <canvas id="ageChart"></canvas>
            </div>
        </div>
        <form class="bg-white p-5 rounded-lg flex flex-col gap-5"
            action="{{ route('infosessions.update', $infoSession) }}" method="POST" class="flex flex-col gap-3">
            @csrf
            @method('PUT')
            <div class="flex gap-4 w-full">
                <div class="flex flex-col gap-2 w-full items-start ">
                    <label for="">Name</label>
                    <input class="w-full rounded" value="{{ old('name', $infoSession->name) }}"
                        placeholder="info session name" type="text" name="name">
                </div>
                <div class="flex flex-col w-full gap-2 items-start">
                    <label for="">Formation</label>
                    <select class="w-full rounded" name="formation" id="">
                        <option value="{{ old('formation', $infoSession->formation) }}" selected>
                            {{ $infoSession->formation }}</option>
                        <option value="{{ $infoSession->formation == 'Coding' ? 'Media' : 'Coding' }}">
                            {{ $infoSession->formation == 'Coding' ? 'Media' : 'Coding' }}</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-4 ">
                <div class="flex flex-col  w-full gap-3 items-start">
                    <label for="">First Session</label>
                    <input value="{{ old('start_date', $infoSession->start_date) }}" class="w-full rounded"
                        name="start_date" type="datetime-local" min="{{ now()->format('Y-m-d\TH:i') }}">
                </div>
                {{-- <div class="flex flex-col w-full  gap-3 items-start">
                    <label for="">Second Session</label>
                    <input value="{{ old('end_date', $infoSession->end_date) }}" class="w-full rounded" name="end_date"
                        type="datetime-local" min="{{ now()->format('Y-m-d\TH:i') }}">
                </div> --}}
            </div>
            <div class="flex gap-4">
                <div class="w-full ">
                    <label for="">Is Available</label>
                    <div class="flex gap-8">
                        <div class="flex gap-3 items-center">
                            <h1>Yes</h1>
                            <input type="radio" {{ $infoSession->isAvailable ? 'checked' : '' }} value="true"
                                name="isAvailable" class='checked:bg-black'>
                        </div>
                        <div class="flex gap-3 items-center">
                            <h1>No</h1>
                            <input type="radio" {{ !$infoSession->isAvailable ? 'checked' : '' }} value="false"
                                name="isAvailable" class='checked:to-black'>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <label for="">Is Finish</label>
                    <div class="flex gap-8">
                        <div class="flex gap-3 items-center">
                            <h1>Yes</h1>
                            <input class=" checked:bg-black" type="radio"
                                {{ $infoSession->isFinish ? 'checked' : '' }} value="true" name="isFinish">
                        </div>
                        <div class="flex gap-3 items-center">
                            <h1>No</h1>
                            <input class=" checked:bg-black" type="radio"
                                {{ !$infoSession->isFinish ? 'checked' : '' }} value="false" name="isFinish">
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-alpha text-base font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500  sm:w-auto sm:text-sm">
                    Update </button>
            </div>
        </form>


        @include('participants.partials.participants_table', [
            'parts' => $infoSession->participants,
            'infos' => [],
        ])
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
