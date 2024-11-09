<div id="projectCreate" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-hidden h-full w-full px-4 ">

    <div class="h-screen w-screen flex items-center justify-center overflow-x-hidden">

        <div class="bg-white w-[30%] rounded-lg p-5">
            <div class="flex justify-between p-2 px-3 py-2">
                <h1 class="text-lg font-semibold">Add New Project</h1>

                <button onclick="closeModal('projectCreate')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="mt-2">
                <form enctype="multipart/form-data" action="{{ route('projects.store') }}" method="POST" class="flex flex-col gap-3">
                    @csrf
                    <div class="flex flex-col gap-2 items-start">
                        <label for="name">Project Name <span class="text-red-400">*</span></label>
                        <input class="w-full rounded" placeholder="Enter project name or owner name" type="text"
                            name="name" id="name">
                    </div>

                    <div class="flex flex-col gap-2 items-start">
                        <label for="description">Project Description <span class="text-red-400">*</span></label>
                        <textarea class="w-full rounded" rows="6" placeholder="Enter a brief description of the project" name="description" id="description"></textarea>
                    </div>

                    <div class="flex flex-col gap-3 items-start">
                        <label for="logo">Project Logo <span class="text-red-400">*</span></label>
                        <div class="w-full flex items-center px-3 text-gray-500 rounded border h-10 cursor-pointer border-black relative">
                            <span>+ Upload project logo</span>
                            <input title="Upload logo here" accept="image/*" class="w-full cursor-pointer opacity-0 py-1 absolute top-0 rounded" name="logo" type="file" id="logo">
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 items-start">
                        <label for="preview">Project Preview Image (Optional)</label>
                        <div class="w-full flex items-center px-3 text-gray-500 rounded border h-10 cursor-pointer border-black relative">
                            <span>+ Upload preview image</span>
                            <input title="Upload preview image here" accept="image/*" class="w-full cursor-pointer opacity-0 py-1 absolute top-0 rounded" name="preview" type="file" id="preview">
                        </div>
                    </div>

                    <div class="px-4 py-3 sm:px-6 gap-3 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-alpha text-base font-medium text-black  hover:bg-gray-800  hover:text-alpha sm:ml-3 sm:w-auto sm:text-sm">
                            Create Project
                        </button>
                        <button onclick="closeModal('projectCreate')" type="button"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
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
