<div class="flex items-center justify-center text-black">
    <div x-data="{ showModal: false }">
        <!-- Button to open the modal -->
        <button @click="showModal = true"
        :class="darkmode ? 'bg-alpha text-black hover:opacity-75' : 'bg-black text-white hover:bg-alpha hover:text-black'"
            class="px-2 md:px-6 py-2  text-base font-medium rounded-md shadow  transition">
            Create new session </button>
        <!-- Background overlay -->
        <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showModal = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed z-10 inset-0 overflow-y-auto w-full" x-cloak>
            <div class="flex w-full items-end justify-center  pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal panel -->
                <div
                :class="darkmode ? 'bg-dark text-white' : 'bg-white'"
                class="w-full inline-block align-bottom  rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class=" w-full px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Modal content -->
                        <div class="">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class=" text-lg leading-6 font-medium" id="modal-headline"> Create
                                    Info
                                    Session
                                </h3>
                                <div class="mt-2">
                                    <form action="{{ route('infosessions.store') }}" method="POST" class="flex flex-col gap-3">
                                        @csrf
                                        <div class="flex flex-col gap-2 items-start ">
                                            <label for="">Name</label>
                                            <input class="w-full rounded text-black" placeholder="info session name" type="text"
                                                name="name">
                                        </div>
                                        <div class="flex flex-col gap-2 items-start">
                                            <label for="">Formation</label>
                                            <select class="w-full rounded text-black" name="formation" id="">
                                                <option disabled selected>Formation</option>
                                                <option value="Coding">Coding</option>
                                                <option value="Media">Media</option>
                                            </select>
                                        </div>
                                        <div class="flex flex-col gap-3 items-start">
                                            <label for="">Session Date</label>
                                            <input min="{{ now()->format('Y-m-d\TH:i') }}" class="w-full rounded text-black" name="start_date" type="datetime-local">
                                        </div>
                                        <div class="flex flex-col gap-2 items-start">
                                            <label for="">Places</label>
                                            <input class="w-full rounded text-black" name="places" placeholder="0" type="number">
                                        </div>
                                        <div class="px-4 py-3 sm:px-6 gap-3 sm:flex sm:flex-row-reverse">
                                            <button  type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-alpha text-base font-medium text-black hover:bg-alpha hover:text-black transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpha sm:ml-3 sm:w-auto sm:text-sm">
                                                Create </button>
                                            <button @click="showModal = false" type="button"
                                                class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
