<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Update Info Session') }}
        </h2>
    </x-slot>
    <div class="p-10"
        x-data='{
        participants: {{ json_encode($participants) }},
        confirmations: {{ json_encode($confirmations) }},
        searchQuery: localStorage.getItem("searchQuery") || "",
        selectedStep: localStorage.getItem("selectedStep") || "",
        selectedSession: localStorage.getItem("selectedSession") || "",
        {{-- search function: return true if any of the conditions are met --}}
        matchesSearch(participants) {
        const query = this.searchQuery.toLowerCase();
        return participants.full_name.toLowerCase().includes(query) ||
            participants.email.toLowerCase().includes(query) ||
            participants.phone.toLowerCase().includes(query);},


        matchesStep(participant) {
        return this.selectedStep === "" || participant.current_step === this.selectedStep;
        },

        matchesSession(participant) {
        return this.selectedSession === "" || participant.info_session_id === Number(this.selectedSession);
        },

        matchesFilter(participant) {
        return this.matchesSearch(participant) && this.matchesStep(participant) && this.matchesSession(participant);
        },


        {{-- make date look better --}}
        formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString("en-US", {
            year: "numeric",
            month: "long",
            day: "numeric",
        });
        },


        {{-- Resetting the filters --}}
        resetFilter() {
        this.searchQuery = "";
        this.selectedStep = "";
        this.selectedSession = "";
        localStorage.removeItem("selectedStep");
        localStorage.removeItem("searchQuery");
        localStorage.removeItem("selectedSession");
        },

        {{-- Copying the emails --}}
        buttonText: "Copy Emails",
        copyToClip() {
            let content = "";
            const filteredParticipants=this.participants.filter(participant=> this.matchesFilter(participant));

            filteredParticipants.forEach(participant => {
            content += participant.email + ", ";
            });

            if (content.endsWith(", ")) {
                content = content.slice(0, -2);
            }
            const textArea = document.createElement("textarea");
            textArea.value = content;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                    document.execCommand("copy");
                    this.buttonText = "Email Copied";
                    setTimeout(() => {
                        this.buttonText = "Copy Emails";
                    }, 2000);
                } catch (err) {
                    console.error("Unable to copy to clipboard", err);
                }
            document.body.removeChild(textArea);
            },

        {{-- Sorting --}}
            sortCriteria: "",
            sortOrder: "asc",

             {{-- Sort Function --}}
            sortTable(criteria) {
            {{-- if same criteria button clicked then change the sorting order --}}
                if (this.sortCriteria === criteria) {
                    this.sortOrder = this.sortOrder === "asc" ? "desc" : "asc";
                }
                {{-- else define a new criteria and set the order --}}
                else {
                    this.sortCriteria = criteria;
                    this.sortOrder = "asc";
                }

                {{-- sorts the participants depending on the criteria --}}
                this.participants = this.participants.sort((a, b) => {
                    if (criteria === "name") {
                        return this.sortOrder === "asc" ? a.full_name.localeCompare(b.full_name) : b.full_name.localeCompare(a.full_name);
                    }  else if (criteria === "birthday") {
                        return this.sortOrder === "asc" ? Date.parse(a.birthday) - Date.parse(b.birthday) : Date.parse(b.birthday) - Date.parse(a.birthday);
                    } else if (criteria === "gender") {
                        return this.sortOrder === "asc" ? a.gender.localeCompare(b.gender) : b.gender.localeCompare(a.gender);
                    } else {
                        return 0;
                    }
                });
            },

            modalContent: "",
            id: "",


            genderCounts() {
                let counts = { male: 0, female: 0 };
                this.participants.forEach(p => {
                    let tempoP = this.matchesFilter(p);
                    if (tempoP) {
                        if (p.gender == "male") {
                        counts.male++;
                        }
                        if (p.gender == "female") {
                        counts.female++;
                        }
                    }
                });
                return counts;
            },
        }'>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
            <div class="bg-white flex flex-col gap-5 font-bold px-5 py-8 shadow rounded-xl">
                <div class="flex justify-between">
                    <h1 class="text-xl">Session</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                </div>
                <p>{{ $infoSession->name }}</p>
                <p>{{ \Carbon\Carbon::parse($infoSession->start_date)->format('d/m/Y') }}</p>
                <p>{{ \Carbon\Carbon::parse($infoSession->start_date)->format('h:i A') }}</p>
            </div>
            <div class="bg-white flex flex-col  gap-5 font-bold  px-5 py-8 shadow rounded-xl">
                <div class="flex justify-between items-center">
                    <h1 class=" text-xl">Participants</h1>
                    <p>{{ $infoSession->participants->count() }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <div class="grid grid-cols-2">
                    <p>Interview: {{ $infoSession->participants->where('current_step', 'interview')->count() }}</p>
                    <p>Failed: {{ $infoSession->participants->where('current_step', 'interview_failed')->count() }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Jungle: {{ $infoSession->participants->where('current_step', 'jungle')->count() }}

                        <span>({{ $infoSession->participants()->whereHas('confirmation', function ($query) {
                                $query->where('jungle', 1);
                            })->count() }})
                        </span>
                    </p>
                    <p>Failed: {{ $infoSession->participants->where('current_step', 'jungle_failed')->count() }}</p>
                </div>

                <div class="grid grid-cols-2">
                    <p>Pending: {{ $infoSession->participants->where('current_step', 'interview_pending')->count() }}
                    </p>
                    <p>School:
                        {{ $infoSession->participants->where('current_step', strtolower($infoSession->formation . '_school'))->count() }}

                        <span>({{ $infoSession->participants()->whereHas('confirmation', function ($query) {
                                $query->where('school', 1);
                            })->count() }})
                        </span>

                    </p>
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

                <p> <span class="text-sky-300">Males:</span> <span x-text="genderCounts().male"></span></p>
                <p> <span class="text-pink-300">Females:</span> <span x-text="genderCounts().female"></span></p>
            </div>

        </div>
        <div>
            <div class="hidden lg:flex items-center gap-3 justify-end pt-12 flex-wrap ">

                <div class="flex justify-around lg:justify-around gap-5 w-full lg:w-fit items-center ">
                    @include('info_session.partials.update_session_modal')
                    {{-- commentit hadi bach maywerkoch 3liha "USERS" bl ghalat --}}
                    {{-- @include('info_session.partials.delete-session_modal') --}}

                </div>
            </div>
        </div>
        <div class="pt-12">
            <div class="mx-auto">

                {{-- Button to change the table viewing Mode --}}
                <form action="{{ route('table.view') }}" method="POST" class="flex gap-3" x-data="{
                    mode: '{{ Auth::user()->mode->tablemode }}',
                }">
                    @csrf
                    <button class="p-2 rounded-t-lg" name="view"
                        :class="{
                            'bg-white': (mode == 'table') && !darkmode,
                            'bg-dark': (mode == 'table') && darkmode,
                        }"
                        type="submit" value="table">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            :stroke="darkmode ? '#fff' : '#000'" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </button>

                    <button class="p-2 rounded-t-lg " name="view"
                        :class="{
                            'bg-white': (mode == 'card') && !darkmode,
                            'bg-dark': (mode == 'card') && darkmode,
                        }"
                        type="submit" value="card">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            :stroke="darkmode ? '#fff' : '#000'" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                    </button>
                </form>

                <div :class="darkmode ? 'bg-dark text-white' : 'bg-white text-black'"
                    class=" shadow-sm sm:rounded-b-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-end gap-5 w-full items-center">
                            <form action="{{ route('questions.export') }}" method="post">
                                @csrf

                                <button class="bg-black px-2 py-1 rounded text-white">
                                    Export Questions
                                </button>

                            </form>
                            <form action='{{ route('participant.export') }}' method="post">
                                @csrf
                                <input class="hidden" type="text" name="term" id="term"
                                    :value="searchQuery">
                                <input class="hidden" type="text" name="step" id="step"
                                    :value="selectedStep">
                                <input class="hidden" type="text" name="session" id="session"
                                    :value="selectedSession ? selectedSession : {{ $infoSession ? $infoSession->id : null }}">
                                <button class="bg-black px-2 py-1 rounded text-white ">
                                    Export Students
                                </button>
                            </form>
                        </div>
                        <br>
                        <div class="flex mb-3 items-center justify-between gap-4 flex-col lg:flex-row">
                            {{-- filters --}}
                            <div class="flex items-center flex-wrap lg:flex-nowrap gap-4 w-full p-2">
                                <div class="w-full lg:w-1/3 flex items-center bg-gray-100 rounded-lg pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    {{-- change the variable to whatever is in the input --}}
                                    <input @change="localStorage.setItem('searchQuery', searchQuery)"
                                        x-model="searchQuery" placeholder="Name, Email or Phone" type="search"
                                        name="search" id="search"
                                        class="border-none bg-transparent w-full outline-none focus:border-none focus:ring-0 focus:outline-none text-sm">

                                </div>


                                <select x-model="selectedStep" name="step" id="step"
                                    @change="localStorage.setItem('selectedStep', selectedStep)"
                                    class="rounded border border-gray-300 py-1 w-full md:w-[48%] lg:w-1/3">
                                    <option value="" disabled selected>Filter By Steps</option>
                                    <option value="">All Steps</option>
                                    <option value="info_session">Info Session</option>
                                    <option value="interview">Interview</option>
                                    <option value="interview_pending">Interview Pending</option>
                                    <option value="interview_failed">Interview Failed</option>
                                    <option value="jungle">Jungle</option>
                                    <option value="jungle_failed">Jungle Failed</option>
                                    <option value="coding_school">Coding School</option>
                                    <option value="media_school">Media School</option>
                                </select>



                                <button @click="resetFilter()"
                                    :class="darkmode ? 'bg-alpha text-black' : 'bg-black text-white'"
                                    class=" px-2 w-full md:w-[48%] lg:w-1/3 py-1 rounded ">
                                    Reset Filters
                                </button>

                                <button @click="copyToClip()" id="copyBtn"
                                    class=" px-2 w-full md:w-[48%] lg:w-1/3 py-1 rounded"
                                    :class="darkmode ? ' bg-alpha text-black' : 'bg-black text-white'">
                                    <span x-text="buttonText"></span>
                                </button>
                            </div>
                            @if (Route::is('infosessions.show'))
                                <div class="flex items-center flex-wrap lg:flex-nowrap gap-2">
                                    @include('participants.partials.interview_modal')
                                    @include('participants.partials.jungle_modal')
                                    @include('participants.partials.school_modal')
                                </div>
                            @endif

                        </div>



                        @if (Auth::user()->mode->tablemode == 'table')
                            <table class="w-full text-center" :class="darkmode ? 'text-white' : ''">
                                <thead>
                                    <th></th>
                                    <th @click="sortTable('name')"
                                        class="cursor-pointer flex items-center justify-center">
                                        <div class="flex items-center gap-1">
                                            <p>Name</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                            </svg>
                                        </div>
                                    </th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th @click="sortTable('gender')"
                                        class="cursor-pointer flex items-center justify-center">
                                        <div class="flex items-center gap-1">
                                            <p>Gender</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                            </svg>
                                        </div>
                                    </th>
                                    <th>Session</th>
                                    <th @click="sortTable('birthday')"
                                        class="cursor-pointer flex items-center justify-center">
                                        <div class="flex items-center gap-1">
                                            <p>Date of Birthday</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                            </svg>
                                        </div>
                                    </th>
                                    <th>Current Step</th>
                                </thead>

                                <tbody class="w-full">
                                    <template x-for="participant in participants" :key="participant.id">
                                        <tr x-show="matchesFilter(participant)" class="h-[7vh] cursor-pointer "
                                            :class="darkmode ? 'hover:bg-deep' : 'hover:bg-gray-100'"
                                            x-on:click="window.location.href = '/participants/' + participant.id">
                                            <td>
                                                <img x-show="participant.image" loading="lazy"
                                                    :src="`{{ asset('storage/images/participants/') }}/${participant.image}`"
                                                    class="w-[25px] rounded-full aspect-square object-cover"
                                                    alt="">

                                                <svg x-show="!participant.image" version="1.0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280 280"
                                                    preserveAspectRatio="xMidYMid meet" class="w-[25px]"
                                                    :class="darkmode ? 'text-white' : 'text-black'">

                                                    <g transform="translate(0.000000,315.000000) scale(0.100000,-0.100000)"
                                                        fill="currentColor" stroke="none">
                                                        <path
                                                            d="M705 3008 c-41 -120 -475 -1467 -475 -1474 1 -9 1238 -910 1257 -916 6 -2 294 203 640 454 l631 458 -84 257 c-46 142 -154 477 -241 745 l-158 488 -783 0 c-617 0 -784 -3 -787 -12z m1265 -412 c0 -3 65 -205 145 -451 80 -245 145 -448 145 -450 0 -2 -173 -130 -384 -283 l-384 -280 -384 279 c-283 207 -382 284 -380 297 5 22 283 875 289 885 4 7 953 10 953 3z" />
                                                        <path
                                                            d="M1176 1661 c21 -15 101 -74 178 -130 l139 -101 31 23 c17 13 92 68 166 122 74 54 139 102 144 106 6 5 -145 9 -344 9 l-354 0 40 -29z" />
                                                    </g>
                                                </svg>
                                            </td>
                                            <td>
                                                <span class="cursor-pointer border-b border-black"
                                                    x-on:click="window.location.href = '/participants/' + participant.id"
                                                    x-text="participant.full_name"></span>
                                            </td>
                                            <td x-text="participant.phone"></td>
                                            <td x-text="participant.email"></td>
                                            <td>
                                                <span x-text="participant.gender"
                                                    :class="participant.gender == 'male' ? 'bg-sky-100' : 'bg-pink-100'"
                                                    class="text-sm rounded-full px-2 py-1 capitalize text-black">
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="p-1 rounded-lg border {{ $infoSession->formation == 'Coding' ? 'bg-black/80 text-white border-white' : 'bg-yellow-200 border-yellow-400 text-black' }}">{{ $infoSession->formation }}
                                                    {{ $infoSession->name }}</span>

                                            </td>
                                            <td x-text="formatDate(participant.birthday) + '/Age: ' + participant.age">
                                            </td>
                                            <td class="capitalize"
                                                x-text="participant.current_step.replace('_', ' ')"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">

                                <template x-for="participant in participants" :key="participant.id">

                                    <div class="shadow-md group rounded-lg relative"
                                        x-show="matchesFilter(participant)">
                                        <div :class="participant.current_step == 'jungle' || participant.current_step.includes(
                                                'school') ?
                                            '' : 'pr-2'"
                                            class="absolute capitalize top-[10px] right-[10px] bg-black text-white pl-2 rounded-full flex items-center gap-2 ">
                                            <p x-text="participant.current_step.replace('_', ' ')"></p>
                                            {{-- confirmation for jungle --}}
                                            <p x-show="participant.current_step == 'jungle'"
                                                class="rounded-r-full px-2"
                                                :class="confirmations.find(confirmation => confirmation.participant_id ===
                                                        participant
                                                        .id)
                                                    .jungle ? 'bg-green-500' : 'bg-red-600'"
                                                x-text="
                                        confirmations.find(confirmation => confirmation.participant_id === participant.id).jungle ? 'Confirmed' : 'Not Confirmed'">
                                            </p>
                                            {{-- confirmation for school --}}
                                            <p x-show="participant.current_step.includes('school')"
                                                class="rounded-r-full px-2"
                                                :class="confirmations.find(confirmation => confirmation.participant_id ===
                                                        participant
                                                        .id)
                                                    .school ? 'bg-green-500' : 'bg-red-600'"
                                                x-text="
                                        confirmations.find(confirmation => confirmation.participant_id === participant.id).school ? 'Confirmed' : 'Not Confirmed'">
                                            </p>
                                        </div>

                                        <a :href="'/participants/' + participant.id">

                                            <img x-show="participant.image"
                                                :src="`{{ asset('storage/images/participants/') }}/${participant.image}`"
                                                class="w-full aspect-square object-cover rounded-t cursor-pointer"
                                                alt="participant_image">

                                            <svg x-show="!participant.image" version="1.0"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280 280"
                                                preserveAspectRatio="xMidYMid meet" class="cursor-pointer"
                                                :class="darkmode ? 'text-white' : 'text-black'">

                                                <g transform="translate(0.000000,315.000000) scale(0.100000,-0.100000)"
                                                    fill="currentColor" stroke="none">
                                                    <path
                                                        d="M705 3008 c-41 -120 -475 -1467 -475 -1474 1 -9 1238 -910 1257 -916 6 -2 294 203 640 454 l631 458 -84 257 c-46 142 -154 477 -241 745 l-158 488 -783 0 c-617 0 -784 -3 -787 -12z m1265 -412 c0 -3 65 -205 145 -451 80 -245 145 -448 145 -450 0 -2 -173 -130 -384 -283 l-384 -280 -384 279 c-283 207 -382 284 -380 297 5 22 283 875 289 885 4 7 953 10 953 3z" />
                                                    <path
                                                        d="M1176 1661 c21 -15 101 -74 178 -130 l139 -101 31 23 c17 13 92 68 166 122 74 54 139 102 144 106 6 5 -145 9 -344 9 l-354 0 40 -29z" />
                                                </g>
                                            </svg>
                                        </a>

                                        <div class="flex items-center rounded-b justify-between p-2"
                                            :class="participant.current_step.includes('fail') ?
                                                'bg-red-100 group-hover:bg-red-50' :
                                                participant.current_step == 'jungle' ?
                                                'bg-blue-100 group-hover:bg-blue-50' :
                                                participant.current_step.includes('school') ?
                                                'bg-green-100 group-hover:bg-green-50' :
                                                participant.current_step.includes('pending') || participant
                                                .current_step ==
                                                'interview' ? 'bg-gray-100 group-hover:bg-gray-50' : 'bg-white'">
                                            <div class="capitalize">
                                                <h2 class="text-lg font-semibold" x-text="participant.full_name"></h2>
                                                <p x-text="participant.city"></p>
                                                <p x-text="participant.prefecture.replace(/_/g, ' ')"></p>
                                            </div>

                                            {{-- Modal --}}
                                            <div x-show="modalContent"
                                                class="fixed inset-0 bg-gray-700 flex items-center justify-center">
                                                <div class="bg-white rounded-lg shadow-lg p-6 w-[80vw] lg:w-[33vw]">
                                                    <h2 class="text-lg font-semibold text-gray-800">Are you sure?</h2>

                                                    <p x-show="modalContent == 'next'"
                                                        class="text-sm text-gray-600 mt-2">Do
                                                        you really want to move participant to the next step
                                                        <span
                                                            x-text="participants.find(participant => participant.id == id).current_step.includes('interview') ? 'Jungle' : 'School'"></span>
                                                    </p>

                                                    <p x-show="modalContent=='deny'"> Are You Sure You Want to Deny
                                                        <span
                                                            x-text="participants.find(participant => participant.id == id).full_name"></span>
                                                    </p>

                                                    <div class="flex justify-end space-x-4 mt-4">
                                                        <button x-on:click="modalContent = ''"
                                                            class="py-2 px-4 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>


                                                        <form :action="`{{ route('participant.step', '') }}/${id}`"
                                                            method="post">
                                                            @csrf
                                                            <button x-show="modalContent == 'deny'" name="action"
                                                                value="deny"
                                                                class="py-2 px-4 bg-red-600 rounded-lg hover:bg-red-700 text-white">
                                                                Deny
                                                            </button>

                                                            <button x-show="modalContent == 'next'" name="action"
                                                                value="next"
                                                                class="py-2 px-4 bg-gray-900 rounded-lg hover:bg-gray-700 text-white">
                                                                Next
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Modal Buttons for denying or next step --}}
                                            <div class="flex flex-col gap-2"
                                                x-show="!participant.current_step.includes('fail') &&
                                        !participant.current_step.includes('school') &&
                                        !participant.current_step.includes('info')
                                    ">

                                                <button
                                                    x-on:click="
                                        modalContent = 'deny';
                                        id = participant.id;
                                        "
                                                    type="button" id="deny-step-button"
                                                    class="bg-red-600 hover:bg-red-700 text-white py-1 px-2 rounded">
                                                    Deny
                                                </button>
                                                <button
                                                    x-on:click="
                                        modalContent = 'next';
                                        id = participant.id
                                        "
                                                    type="button"
                                                    class="bg-black hover:bg-gray-900 text-white py-1 px-2 rounded">
                                                    Next Step
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </template>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>



    </div>

</x-app-layout>
