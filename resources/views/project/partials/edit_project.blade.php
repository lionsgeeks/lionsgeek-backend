<div id="projectUpdate{{ $project->id }}" class="fixed inset-0 bg-gray-900 bg-opacity-60 hidden items-center justify-center z-50">
    <div class="bg-white w-1/3 rounded-lg p-5">
        <div class="flex justify-between items-center p-2 px-3 py-2">
            <h1 class="text-lg font-semibold">Edit Project: {{ $project->name }}</h1>
            <button onclick="closeModal('projectUpdate{{ $project->id }}')" type="button"
                class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm p-1.5 inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div x-data="{ tab: 'English' }" class="w-[100%] flex flex-col items-center">
            {{-- Language buttons --}}
            <div class="flex items-center justify-center gap-2 p-2 w-[100%] bg-slate-200 rounded">
                @foreach (['English', 'Français', 'العربية'] as $language)
                    <button @click="tab = '{{ $language }}'"
                        :class="{ 'bg-white text-black': tab === '{{ $language }}', 'bg-slate-200 text-black': tab !== '{{ $language }}' }"
                        type="button" class="w-1/3 rounded-md font-medium p-1">
                        {{ $language }}
                    </button>
                @endforeach
            </div>
            <div class="mt-2 w-[100%]">
                <form enctype="multipart/form-data" action="{{ route('projects.update', $project->id) }}" method="POST"
                    class="flex flex-col gap-3">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-2">
                        <label for="name">Project Name <span class="text-red-400">*</span></label>
                        <input value="{{ old('name', $project->name) }}" class="w-full rounded" placeholder="e.g., Project Alpha" type="text" name="name" id="name">
                    </div>
                    <div class="flex flex-col gap-2 items-start text-black" x-show="tab === 'English' ">
                        <label for="description_en">Project Description <span class="text-red-400">*</span></label>
                        <textarea class="w-full rounded" rows="6" placeholder="Enter a brief description of the project" name="description[en]" id="description_en">{{ old('description_en', $project->description->en) }}</textarea>
                    </div>
                    <div class="flex flex-col gap-2 items-start text-black" x-show="tab === 'Français' ">
                        <label for="description_fr">Project Description <span class="text-red-400">*</span></label>
                        <textarea class="w-full rounded" rows="6" placeholder="Enter a brief description of the project" name="description[fr]" id="description_fr">{{ old('description_fr', $project->description->fr) }}</textarea>
                    </div>
                    <div class="flex flex-col gap-2 items-start text-black" x-show="tab === 'العربية' ">
                        <label for="description_ar">Project Description <span class="text-red-400">*</span></label>
                        <textarea class="w-full rounded" rows="6" placeholder="Enter a brief description of the project" name="description[ar]" id="description_ar">{{ old('description_ar', $project->description->ar) }}</textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="logo">Project Logo <span class="text-red-400">*</span></label>
                        <div class="w-full flex items-center px-3 text-gray-500 rounded border h-10 cursor-pointer border-black relative">
                            <span>+ Upload a new logo</span>
                            <input title="Upload logo here" accept="image/*" class="w-full cursor-pointer opacity-0 absolute top-0" name="logo" type="file" id="logo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="preview">Project Preview Image</label>
                        <div class="w-full flex items-center px-3 text-gray-500 rounded border h-10 cursor-pointer border-black relative">
                            <span>+ Upload a preview image</span>
                            <input title="Upload preview image here" accept="image/*" class="w-full cursor-pointer opacity-0 absolute top-0" name="preview" type="file" id="preview">
                        </div>
                    </div>
                    <div class="px-4 py-3 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full sm:w-auto bg-alpha text-base font-medium text-black  hover:bg-gray-800  hover:text-alpha px-4 py-2 rounded-md">Save Changes</button>
                        <button onclick="closeModal('projectUpdate{{ $project->id }}')" type="button" class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
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