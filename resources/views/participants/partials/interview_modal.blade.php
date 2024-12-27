<div class="flex items-center justify-center">
    <div x-data="{ interviewModal: false }">
        <!-- Button to open the modal -->
        <button @click="interviewModal = true" class="w-full bg-black px-2 py-1 rounded font-medium text-white ">
            Interview </button>
        <!-- Background overlay -->
        <div x-show="interviewModal" class="fixed inset-0 transition-opacity" aria-hidden="true"
            @click="interviewModal = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div x-show="interviewModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed z-10 inset-0 overflow-y-auto w-full" x-cloak>
            <div class="flex w-full items-end justify-center  pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal panel -->
                <div class="w-full inline-block align-bottom bg-white max-h-[90vh] overflow-y-auto rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="w-full px-4 pt-5 pb-4 sm:p-2 sm:pb-4 bg-white">
                        <!-- Modal content -->
                        <div class=" p-2">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="mt-2 flex flex-col gap-y-8  pt-4">
                                    {{-- <div class="sm:flex sm:items-start">
                                        <div class="sm:mt-0 text-center w-full  ">
                                            <h3 class="text-lg leading-6 ont-bold text-gray-900" id="modal-headline">
                                                Send Invitation to Participants </h3>
                                        </div>
                                    </div> --}}
                                    <form x-data="{ times: [] }" action="{{ route('participant.interview') }}"
                                        method="POST" class="flex flex-col gap-y-2">
                                        @csrf
                                        <div class="w-full flex items-center justify-between mb-4">
                                            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-headline">
                                                Send Invitation to Participants </h3>
                                                <button type="button" @click="times.push({ id: Date.now() });"
                                                    class="px-4 py-2 bg-black rounded-lg text-white flex flex-row-reverse items-center gap-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle size-5" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                                      </svg>
                                                      <span>Add Date</span>
                                                   </button>
                                        </div>
                                        <div class="flex    h-[8vh] bg-slate-50   items-center border rounded-lg px-4"> 
                                            <h1
                                                class="rounded-full rounded-e-none  text-gray-500   flex items-center border-r p-2">
                                                Choose a Date </h1>
                                            {{-- <input min="{{Carbon\Carbon::now()->format('Y-m-d')}}" type="date" name="date"> --}}
                                            <input value="{{ old('start_date', $infoSession->start_date) }}"
                                                class="   border-0 bg-transparent  " name="dates[]" type="datetime-local"
                                                min="{{ now()->format('Y-m-d\TH:i') }}">
                                            <input type="hidden" name="infosession_id" value="{{ $infoSession->id }}">
                                        </div>
                                        <div class="flex flex-col gap-y-2">
                                            <template x-for="(time, index) in times" :key="time.id">
                                                
                                                <div class="my-1    flex justify-between  bg-slate-50 h-[8vh]  items-center border rounded-lg px-4">
                                                    <div class="flex">
                                                        <h1
                                                        class=" text-center   rounded-full rounded-e-none  text-gray-500   flex items-center border-r p-2">
                                                        Choose a Date </h1>
                                                        <input :name="`dates[]`"
                                                            value="{{ old('start_date', $infoSession->start_date) }}"
                                                            class="  border-t-0 border-b-0 border-l-0 border-gray-200 bg-transparent" type="datetime-local"
                                                            :min="`{{ now()->format('Y-m-d\TH:i') }}`">
                                                    </div>
                                                    <button type="button" @click="times.splice(index, 1)" class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-7 cursor-pointer">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18 18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>



                                        </div>
                                        <div class="px-4 py-3 sm:px-6 gap-3 sm:flex sm:flex-row-reverse">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-6 py-2 bg-black text-base font-medium text-white hover:bg-alpha hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpha sm:ml-3 sm:w-auto sm:text-sm">
                                                Send </button>
                                            <button @click="interviewModal = false" type="button"
                                                class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-6 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Cancel </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
