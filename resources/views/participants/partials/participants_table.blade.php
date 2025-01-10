<div class="pt-12"
    x-data='{
participants: {{ json_encode($parts) }},
infos: {{ json_encode($infos) ?? '[]' }},
searchQuery: "",
selectedStep: "",
selectedSession: "",
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


    satisfactions: {{ json_encode($satisfactions) }}
}'>
    <div class="mx-auto">
        @php
            // I called this here instead of calling it in Participant+session controllers
            $generals = App\Models\General::find(1);
        @endphp
        {{-- Button to change the table viewing Mode --}}
        <form action="{{ route('table.view') }}" method="POST" class="flex gap-3">
            @csrf
            <button
                class="p-2 rounded-t-lg {{ $generals->tablemode == 'table' ? 'bg-black text-white' : 'bg-white text-black' }}"
                name="view" type="submit" value="table">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                </svg>
            </button>

            <button
                class="p-2 rounded-t-lg {{ $generals->tablemode == 'card' ? 'bg-black text-white' : 'bg-white text-black' }}"
                name="view" type="submit" value="card">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
            </button>
        </form>

        <div class="bg-white shadow-sm sm:rounded-b-lg">
            <div class="p-6 text-gray-900">
                <div class="flex mb-3 items-center justify-between gap-4 bg-white flex-col lg:flex-row">
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
                            <input x-model="searchQuery" placeholder="Name, Email or Phone" type="search"
                                name="search" id="search"
                                class="border-none bg-transparent w-full outline-none focus:border-none focus:ring-0 focus:outline-none text-sm">

                        </div>


                        <select x-model="selectedStep" name="step" id="step"
                            class="rounded border border-gray-300 py-1 w-full lg:w-1/3">
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

                        @if ($infos)
                            <select x-model="selectedSession" name="session" id="session"
                                class="rounded border border-gray-300 py-1 w-full lg:w-1/3">
                                <option value="" disabled selected> Filter By Session</option>
                                @foreach ($infos as $info)
                                    <option value={{ $info->id }}>{{ $info->formation }} {{ $info->name }}
                                    </option>
                                @endforeach
                            </select>
                        @endif

                        <button @click="resetFilter()" class="bg-black px-2 w-full lg:w-1/3 py-1 rounded text-white">
                            Reset Filters
                        </button>

                        <button @click="copyToClip()" id="copyBtn" class=" px-2 w-full lg:w-1/3 py-1 rounded"
                            :class="buttonText == 'Copy Emails' ? 'bg-black text-white' : 'bg-alpha text-black'">
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



                @if ($generals->tablemode == 'table')
                    <table class="w-full text-center">
                        <thead>
                            <th></th>
                            <th @click="sortTable('name')" class="cursor-pointer flex items-center justify-center">
                                <div class="flex items-center gap-1">
                                    <p>Name</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                    </svg>
                                </div>
                            </th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th @click="sortTable('gender')" class="cursor-pointer flex items-center justify-center">
                                <div class="flex items-center gap-1">
                                    <p>Gender</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                    </svg>
                                </div>
                            </th>
                            <th>Session</th>
                            <th @click="sortTable('birthday')" class="cursor-pointer flex items-center justify-center">
                                <div class="flex items-center gap-1">
                                    <p>Date of Birthday</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                    </svg>
                                </div>
                            </th>
                            <th>Current Step</th>
                        </thead>

                        <tbody class="w-full">
                            <template x-for="participant in participants" :key="participant.id">
                                <tr x-show="matchesFilter(participant)"
                                    class="h-[7vh] hover:bg-gray-100 cursor-pointer "
                                    x-on:click="window.location.href = '/participants/' + participant.id">
                                    <td>
                                        <img x-show="participant.image"
                                            :src="`{{ asset('storage/images/participants/') }}/${participant.image}`"
                                            class="w-[25px] rounded-full aspect-square object-cover" alt="">

                                        <svg x-show="!participant.image" version="1.0"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280 280"
                                            preserveAspectRatio="xMidYMid meet" class="w-[25px]">

                                            <g transform="translate(0.000000,315.000000) scale(0.100000,-0.100000)"
                                                fill="#000" stroke="none">
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
                                            class="text-sm rounded-full px-2 py-1 capitalize">
                                        </span>
                                    </td>
                                    <td>
                                        <span class="hidden"
                                            x-text="session = infos.find(session => session.id === participant.info_session_id)"></span>


                                        @if ($infos)
                                            <span class="p-1 rounded-lg border"
                                                :class="{
                                                    'bg-yellow-200 border-yellow-400': session
                                                        ?.formation === 'Media',
                                                    'bg-black/80 text-white border-white': session
                                                        ?.formation === 'Coding'
                                                }"
                                                x-text="session?.formation + ' ' + session?.name"></span>
                                        @else
                                            <span
                                                class="p-1 rounded-lg border {{ $infoSession->formation == 'Coding' ? 'bg-black/80 text-white border-white' : 'bg-yellow-200 border-yellow-400' }}">{{ $infoSession->formation }}
                                                {{ $infoSession->name }}</span>
                                        @endif

                                    </td>
                                    <td x-text="formatDate(participant.birthday) + '/Age: ' + participant.age"></td>
                                    <td class="capitalize" x-text="participant.current_step.replace('_', ' ')"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                @else
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">

                        <template x-for="participant in participants" :key="participant.id">

                            <div class="shadow-md group rounded-lg relative" x-show="matchesFilter(participant)">
                                <p class="absolute top-[10px] right-[10px] bg-black text-white px-2 rounded-full capitalize"
                                    x-text="participant.current_step.replace('_', ' ')"></p>
                                <img x-show="participant.image"
                                    x-on:click="window.location.href = '/participants/' + participant.id"
                                    :src="`{{ asset('storage/images/participants/') }}/${participant.image}`"
                                    class="w-full aspect-square object-cover rounded cursor-pointer"
                                    alt="participant_image">

                                <svg x-show="!participant.image" version="1.0" xmlns="http://www.w3.org/2000/svg"
                                    x-on:click="window.location.href = '/participants/' + participant.id"
                                    viewBox="0 0 280 280" preserveAspectRatio="xMidYMid meet" class="cursor-pointer">

                                    <g transform="translate(0.000000,315.000000) scale(0.100000,-0.100000)"
                                        fill="#000" stroke="none">
                                        <path
                                            d="M705 3008 c-41 -120 -475 -1467 -475 -1474 1 -9 1238 -910 1257 -916 6 -2 294 203 640 454 l631 458 -84 257 c-46 142 -154 477 -241 745 l-158 488 -783 0 c-617 0 -784 -3 -787 -12z m1265 -412 c0 -3 65 -205 145 -451 80 -245 145 -448 145 -450 0 -2 -173 -130 -384 -283 l-384 -280 -384 279 c-283 207 -382 284 -380 297 5 22 283 875 289 885 4 7 953 10 953 3z" />
                                        <path
                                            d="M1176 1661 c21 -15 101 -74 178 -130 l139 -101 31 23 c17 13 92 68 166 122 74 54 139 102 144 106 6 5 -145 9 -344 9 l-354 0 40 -29z" />
                                    </g>
                                </svg>

                                <div class="flex items-center justify-between p-2"
                                    :class="participant.current_step.includes('fail') ? 'bg-red-100 group-hover:bg-red-50' :
                                        participant.current_step == 'jungle' ? 'bg-blue-100 group-hover:bg-blue-50' :
                                        participant.current_step.includes('school') ? 'bg-green-100 group-hover:bg-green-50' :
                                        participant.current_step.includes('pending') || participant.current_step ==
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

                                            <p x-show="modalContent == 'next'" class="text-sm text-gray-600 mt-2">Do
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
