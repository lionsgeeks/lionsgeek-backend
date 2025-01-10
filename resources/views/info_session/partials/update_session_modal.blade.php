<div class="flex items-center justify-center text-black">
    <div x-data="{ updateModal: false }">
        <!-- Button to open the modal -->
        <button @click="updateModal = true" class="bg-black px-2 py-1 rounded text-white">
            Update  </button>
        <!-- Background overlay -->
        <div x-show="updateModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="updateModal = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div x-show="updateModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed z-10 inset-0 overflow-y-auto w-full" x-cloak>
            <div class="flex w-full items-end justify-center  pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal panel -->
                <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white w-full px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Modal content -->
                        <div class="">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class=" text-lg leading-6 font-medium text-gray-900" id="modal-headline"> Create
                                    Info
                                    Session
                                </h3>
                                <div class="mt-2">
                                    <form class="bg-white p-5 rounded-lg flex flex-col gap-5"
                                        action="{{ route('infosessions.update', $infoSession) }}" method="POST"
                                        class="flex flex-col gap-3">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex gap-4 w-full">
                                            <div class="flex flex-col gap-2 w-full items-start ">
                                                <label for="">Name</label>
                                                <input class="w-full rounded"
                                                    value="{{ old('name', $infoSession->name) }}"
                                                    placeholder="info session name" type="text" name="name">
                                            </div>
                                            <div class="flex flex-col w-full gap-2 items-start">
                                                <label for="">Formation</label>
                                                <select class="w-full rounded" name="formation" id="">
                                                    <option value="{{ old('formation', $infoSession->formation) }}"
                                                        selected>
                                                        {{ $infoSession->formation }}</option>
                                                    <option
                                                        value="{{ $infoSession->formation == 'Coding' ? 'Media' : 'Coding' }}">
                                                        {{ $infoSession->formation == 'Coding' ? 'Media' : 'Coding' }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="flex flex-col gap-2 items-start">
                                                <label for="">Places</label>
                                                <input class="w-full rounded" name="places" value="{{ old('places', $infoSession->places) }}" placeholder="0" type="number">
                                            </div>
                                        </div>
                                        <div class="flex gap-4 ">
                                            <div class="flex flex-col  w-full gap-3 items-start">
                                                <label for="">First Session</label>
                                                <input value="{{ old('start_date', $infoSession->start_date) }}"
                                                    class="w-full rounded" name="start_date" type="datetime-local"
                                                    min="{{ now()->format('Y-m-d\TH:i') }}">
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
                                                        <input type="radio"
                                                            {{ $infoSession->isAvailable ? 'checked' : '' }}
                                                            value="true" name="isAvailable" class='checked:bg-black'>
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <h1>No</h1>
                                                        <input type="radio"
                                                            {{ !$infoSession->isAvailable ? 'checked' : '' }}
                                                            value="false" name="isAvailable" class='checked:to-black'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <label for="">Is Finish</label>
                                                <div class="flex gap-8">
                                                    <div class="flex gap-3 items-center">
                                                        <h1>Yes</h1>
                                                        <input class=" checked:bg-black" type="radio"
                                                            {{ $infoSession->isFinish ? 'checked' : '' }}
                                                            value="true" name="isFinish">
                                                    </div>
                                                    <div class="flex gap-3 items-center">
                                                        <h1>No</h1>
                                                        <input class=" checked:bg-black" type="radio"
                                                            {{ !$infoSession->isFinish ? 'checked' : '' }}
                                                            value="false" name="isFinish">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 sm:px-6 gap-3 sm:flex sm:flex-row-reverse">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-alpha text-base font-medium text-black hover:bg-alpha hover:text-black transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpha sm:ml-3 sm:w-auto sm:text-sm">
                                                Create </button>
                                            <button @click="updateModal = false" type="button"
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
