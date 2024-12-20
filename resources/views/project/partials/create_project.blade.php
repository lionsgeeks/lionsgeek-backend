<div id="projectCreate" class="fixed inset-0 bg-gray-900 bg-opacity-60 justify-center items-center z-50 hidden px-4 py-12">
    <div class="bg-white w-[30%] rounded-lg p-5">
        <div class="flex justify-between p-2 px-3 py-2">
            <h1 class="text-lg font-semibold text-black">Add New Project</h1>
            <button onclick="closeModal('projectCreate')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div x-data="{ tab: 'English' }" class="flex flex-col items-center w-full">
            <div class="flex items-center justify-center gap-2 p-2 w-full bg-slate-200 rounded">
                @foreach (['English', 'Français', 'العربية'] as $language)
                    <button @click="tab = '{{ $language }}'"
                        :class="{ 'bg-white text-black': tab === '{{ $language }}', 'bg-slate-200 text-black': tab !== '{{ $language }}' }"
                        type="button" class="w-1/3 rounded-md font-medium p-1">
                        {{ $language }}
                    </button>
                @endforeach
            </div>

            <form enctype="multipart/form-data" action="{{ route('projects.store') }}" method="POST" class="flex flex-col gap-3 w-full">
                @csrf
                <div class="flex flex-col gap-2 items-start text-black">
                    <label for="name">Project Name <span class="text-red-400">*</span></label>
                    <input class="w-full rounded" placeholder="Enter project name or owner name" type="text" name="name" id="name">
                </div>

                <div class="flex flex-col gap-2 items-start text-black" x-show="tab === 'English'">
                    <label for="description_en">Project Description (English) <span class="text-red-400">*</span></label>
                    <textarea class="w-full rounded" rows="6" placeholder="Enter a brief description of the project" name="description[en]" id="description_en"></textarea>
                </div>

                <div class="flex flex-col gap-2 items-start text-black" x-show="tab === 'Français'">
                    <label for="description_fr">Project Description (French) <span class="text-red-400">*</span></label>
                    <textarea class="w-full rounded" rows="6" placeholder="Enter a brief description of the project" name="description[fr]" id="description_fr"></textarea>
                </div>

                <div class="flex flex-col gap-2 items-start text-black" x-show="tab === 'العربية'">
                    <label for="description_ar">Project Description (Arabic) <span class="text-red-400">*</span></label>
                    <textarea class="w-full rounded" rows="6" placeholder="Enter a brief description of the project" name="description[ar]" id="description_ar"></textarea>
                </div>

                <div class="flex flex-col gap-3 items-start text-black">
                    <label for="logo">Project Logo <span class="text-red-400">*</span></label>
                    <div class="w-full flex items-center px-3 text-gray-500 rounded border h-10 cursor-pointer border-black relative">
                        <span>+ Upload project logo</span>
                        <input title="Upload logo here" accept="image/*" class="w-full cursor-pointer opacity-0 py-1 absolute top-0 rounded" name="logo" type="file" id="logo">
                    </div>
                </div>

                <div class="flex flex-col gap-3 items-start text-black">
                    <label for="preview">Project Preview Image (Optional)</label>
                    <div class="w-full flex items-center px-3 text-gray-500 rounded border h-10 cursor-pointer border-black relative">
                        <span>+ Upload preview image</span>
                        <input title="Upload preview image here" accept="image/*" class="w-full cursor-pointer opacity-0 py-1 absolute top-0 rounded" name="preview" type="file" id="preview">
                    </div>
                </div>

                <div class="flex justify-end mt-3">
                    <button type="button" onclick="translateAndPopulate()" class="px-4 py-2 bg-blue-500 text-white rounded-md">Translate</button>
                </div>

                <div class="px-4 py-3 sm:px-6 gap-3 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-alpha text-base font-medium text-black hover:bg-gray-800 hover:text-alpha sm:ml-3 sm:w-auto sm:text-sm">
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

<div id="waitingModal" class="fixed inset-0 bg-gray-900 bg-opacity-60 z-50 hidden">
    <div class="bg-white p-6 rounded-lg text-center flex flex-col items-center justify-center">
        <div class="w-10 h-10 border-4 border-t-4 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>
    </div>
</div>

<script>
    async function translateAndPopulate() {
        const descriptionEn = document.getElementById('description_en').value;

        const data = {
            description: { en: descriptionEn }
        };
        // console.log(data);
        
        const waitingModal = document.getElementById('waitingModal');
        waitingModal.classList.remove('hidden');
        waitingModal.classList.add('flex', 'justify-center', 'items-center');

        try {
            const response = await fetch('{{ route('projects.translate') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            });
            // console.log(response);

            const result = await response.json();
            // console.log(result);
            
            document.getElementById('description_fr').value = result.data.fr;
            document.getElementById('description_ar').value = result.data.ar;

        } catch (error) {
            console.error('Error during translation:', error);
            alert('There was an error with the translation process. Please try again.');
        } finally {
            waitingModal.classList.add('hidden');
            waitingModal.classList.remove('flex', 'justify-center', 'items-center');
        }
    }

    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden'); 
        modal.classList.add('flex'); 
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden'); 
        modal.classList.remove('flex'); 
    }
</script>
