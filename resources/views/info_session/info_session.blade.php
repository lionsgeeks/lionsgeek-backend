<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Info Session') }}
        </h2>

        {{-- <a href="{{ route('events.create') }}">
            <button
                class=" py-[0.7rem] px-[2rem] text-[16px] font-bold rounded-[10px] bg-alpha hover:bg-black hover:text-white transition
            duration-150 ">Create
                Event
            </button>
        </a> --}}
        
    </x-slot>
    <div class="py-12 md:px-10 px-4 ">
        <div class="bg-white rounded-lg p-6  w-[100%] px-8 min-h-[67vh]">
            <div class="flex justify-end">
                @if ($infosessions->count() > 0)
            @include('info_session.partials.create-session_modal')
        @endif
            </div>
            <div class="flex flex-wrap gap-4 p-8 w-full">
                @if ($infosessions->count() === 0)
                    <div class="h-[70vh] bg-white flex rounded-lg items-center justify-center w-full">
                        <div class="text-center">
                            <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Session Available</h1>
                            <p class="text-gray-500 mb-6">It looks like there aren’t any sessions created yet.</p>
                            @include('info_session.partials.create-session_modal')
                        </div>
                    </div>
                @else
                    @foreach ($infosessions as $infosession)
                        <a class="w-full sm:w-1/2 md:w-1/3 lg:w-[32%]" href={{ "/infosessions/$infosession->id" }}>
                            <div class="bg-white p-5 flex flex-col gap-4 border rounded-lg">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h1 class="text-2xl font-bold">{{ Str::limit($infosession->name, 12, '...') }}</h1>
                                        <div class="flex items-center gap-3 text-gray-500 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                            <p>{{ $infosession->isAvailable ? 'Available' : 'Not Available' }}</p>
                                        </div>
                                    </div>
                                    <div class="bg-black text-sm text-white w-fit px-3 rounded p-1">
                                        <p>{{ $infosession->formation }}</p>
                                    </div>
                                </div>
            
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <h1>First session: {{ \Carbon\Carbon::parse($infosession->start_date)->format('d/m/Y') }}</h1>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h1>Time: {{ \Carbon\Carbon::parse($infosession->start_date)->format('h:i A') }}</h1>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                          </svg>
                                          <h1>Places: {{ count($infosession->participants)  }} / {{ $infosession->places }}</h1>
                                    </div>
                                </div>
            
                                <div class="flex justify-between items-center">
                                    <form action="{{ route('infosessions.isavailable', $infosession->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="border flex items-center gap-2 px-3 py-2 rounded-md">
                                            @if ($infosession->isAvailable)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            @endif
                                            <span>Mark {{ $infosession->isAvailable ? 'Unavailable' : 'Available' }}</span>
                                        </button>
                                    </form>
            
                                    <form action="{{ route('infosessions.isfinish', $infosession->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="border px-3 py-2 rounded-md {{ $infosession->isFinish ? 'bg-gray-200 text-black' : 'bg-black text-white' }}">
                                            {{ $infosession->isFinish ? 'Completed' : 'Mark Complete' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    
</x-app-layout>
