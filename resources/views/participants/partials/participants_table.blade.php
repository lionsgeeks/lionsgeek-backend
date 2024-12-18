<div class="py-12"
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
}'>
    <div class="mx-auto">
        <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex mb-3 items-center justify-between gap-4">
                    {{-- filters --}}
                    <div class="flex items-center gap-4 w-[80%]">
                        <div class="w-1/3 flex items-center bg-gray-100 rounded-lg pl-2">
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
                            class="rounded border border-gray-300 py-1">
                            <option value="" disabled selected>Filter By Steps</option>
                            <option value="">All Steps</option>
                            <option value="info_session">Info Session</option>
                            <option value="interview">Interview</option>
                        </select>

                        @if ($infos)
                            <select x-model="selectedSession" name="session" id="session"
                                class="rounded border border-gray-300 py-1">
                                <option value="" disabled selected> Filter By Session</option>
                                @foreach ($infos as $info)
                                    <option value={{ $info->id }}>{{ $info->formation }} {{ $info->name }}
                                    </option>
                                @endforeach
                            </select>
                        @endif

                        <button @click="resetFilter()" class="bg-black px-2 py-1 rounded text-white">
                            Reset Filters
                        </button>
                    </div>

                        <form action='{{ route('participant.export') }}' method="post">
                            @csrf
                            <input class="hidden" type="text" name="term" id="term" :value="searchQuery">
                            <input class="hidden" type="text" name="step" id="step" :value="selectedStep">
                            <input class="hidden" type="text" name="session" id="session" :value="infos && infos.length > 0 ? selectedSession : {{$infoSession ? $infoSession->id : null}}">
                            <button class="bg-black text-white px-4 py-1 rounded">
                                Export Excel
                            </button>
                        </form>
                </div>

                <table class="w-full text-center">
                    <thead>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Session</th>
                        <th>Date of Birth</th>
                        <th>Current Step</th>
                    </thead>

                    <tbody class="w-full">
                        <template x-for="participant in participants" :key="participant.id">
                            <tr x-show="matchesFilter(participant)" class="h-[7vh] hover:bg-slate-100 cursor-pointer"
                                x-on:click="window.location.href = '/participants/' + participant.id">
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
                                <td x-text="formatDate(participant.birthday)"></td>
                                <td class="capitalize" x-text="participant.current_step.replace('_', ' ')"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
