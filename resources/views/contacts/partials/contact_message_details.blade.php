<div id="contactMessage{{ $contact->id }}"
    class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-hidden h-full w-full px-4 ">

    <div class="h-screen w-screen flex items-center justify-center overflow-x-hidden">

        <div class="bg-white w-[30%] rounded-lg p-5">
            <div class="flex justify-between p-2 px-3 py-2">
                <h1 class="text-lg font-semibold">{{ $contact->full_name }}</h1>

                <button onclick="closeModal('contactMessage{{ $contact->id }}')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

            </div>

            <div class="p-3">
                <div class="flex items-center py-3 mt-3 justify-between">
                    <a href="mailto:{{ $contact->email }}" class="no-underline text-black hover:underline hover:text-alpha font-bold">{{ $contact->email }}</a>
                    <h1 class="font-extralight">{{ $contact->phone }}</h1>
                </div>

                <div class="py-3 text-start">
                    <label for="">Message</label>

                    <p class="h-[20vh] mt-3 border rounded-lg px-2 overflow-y-auto py-4">{{ $contact->message }}</p>
                </div>

                <div class="pt-3 mt-2 flex items-center justify-end gap-x-3">
                    <a class="bg-black px-3 py-2 text-white font-bold hover:bg-alpha hover:text-black rounded-lg" href="mailto:{{ $contact->email }}">Reply via email</a>
                    <button class="border px-3 py-2 rounded-lg">Close</button>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block';
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none';
            });
        }
    };
</script>
