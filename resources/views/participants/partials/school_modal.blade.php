<div class="flex items-center justify-center">
    <div x-data="{ schoolModal: false }">
        <!-- Button to open the modal -->
        <button @click="schoolModal = true" class="w-full bg-black px-2 py-1 rounded font-medium text-white ">
            School </button>
        <!-- Background overlay -->
        <div x-show="schoolModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="schoolModal = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div x-show="schoolModal" x-transition:enter="transition ease-out duration-300 transform"
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
                    <div class="bg-white w-full px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Modal content -->
                        <div class="">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="mt-2">
                                    <div class="sm:flex sm:items-start">
                                        <div class="sm:mt-0 sm:text-left">
                                            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-headline">
                                                Send Invitation to Participants </h3>
                                        </div>
                                    </div>
                                    <form action="{{ route('participant.school') }}" method="POST" class="flex flex-col gap-3">
                                        @csrf
                                        <div class="flex flex-col gap-3 py-3">
                                            <label for="date">Choose School Day Start</label>
                                            <input required min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" type="date" name="date">
                                            <input type="hidden" name="infosession_id" value="{{ $infoSession->id }}">
                                        </div>
                                    
                                        <div class="px-4 py-3 sm:px-6 gap-3 sm:flex sm:flex-row-reverse">
                                            <!-- Normal Send Button (Requires Date) -->
                                            <button type="submit" name="submit_with_date"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-black text-base font-medium text-white hover:bg-alpha focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpha sm:ml-3 sm:w-auto sm:text-sm">
                                                Send
                                            </button>
                                    
                                            <!-- Send Without Date Button -->
                                            <button type="submit" name="submit_without_date"
                                                class="w-full inline-flex justify-center rounded-md border border-gray-500 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:text-sm"
                                                formnovalidate>
                                                Send Without Date
                                            </button>
                                    
                                            <button @click="schoolModal = false" type="button"
                                                class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Cancel
                                            </button>
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
