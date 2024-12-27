<div id="modalAdmin" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class="relative top-10 mx-auto shadow-xl rounded-md bg-white max-w-md">
        <div class="flex justify-end p-2">
            <button onclick="closeModal('modalAdmin')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="px-6">
            <form action="{{ route("addadmin.store") }}" class="flex flex-col gap-3" method="post">
                @csrf
                <h1 class="text-center text-xl font-semibold">Add Admin</h1>
                <div class="flex gap-2 flex-col">
                    <label for="" class="font-semibold">Name :</label>
                    <input type="text" name="name" placeholder="Enter Name" class="p-2 rounded-lg border-2 focus:ring-alpha focus:border-alpha">
                </div>
                <div class="flex gap-2 flex-col">
                    <label for="" class="font-semibold">Email :</label>
                    <input type="email" name="email" placeholder="Enter Email" class="p-2 rounded-lg border-2 focus:ring-alpha focus:border-alpha">
                </div>
                <div class="py-5 flex items-center justify-end gap-x-2 ">
                    <button class=" lg:px-6 px-7 py-2 bg-black text-base font-medium text-white hover:bg-alpha hover:text-black  rounded-md shadow   transition">
                        Add
                    </button>
                    <a href="#" onclick="closeModal('modalAdmin')"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base lg:px-6 px-2 py-2 text-center"
                        data-modal-toggle="delete-user-modal">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>

<script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
</script>
