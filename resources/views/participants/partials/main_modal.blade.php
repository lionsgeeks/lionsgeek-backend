<div class="flex items-center justify-center">
    <div x-data="{ mainModal: false }">
        <!-- Button to open the modal -->
        <button @click="mainModal = true" class="w-full bg-black px-2 py-1 rounded font-medium text-white">
            invite
        </button>

        <!-- Background overlay -->
        <div x-show="mainModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="mainModal = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal -->
        <div x-show="mainModal" 
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed z-10 inset-0  w-full" 
            x-cloak>
            <div class="flex w-full items-end justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal panel -->
                <div class="w-full inline-block align-bottom bg-white max-h-[90vh]  rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="w-full px-4 pt-5 pb-4 sm:p-6 bg-white">
                        <!-- Modal content -->
                        <div class="space-y-6 h-[32vh] flex justify-center items-center">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Interview Card -->
                               
                                    @include('participants.partials.interview_modal')
                                </div>

                                <!-- Jungle Card -->
                                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-200 cursor-pointer">
                                   
                                    @include('participants.partials.jungle_modal')
                                </div>

                                <!-- School Card -->
                                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-200 cursor-pointer">
                                    
                                    @include('participants.partials.school_modal')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                                            
                                            