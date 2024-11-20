<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div x-data="{ tab: 'English' }" class="flex-[44%] p-[1.25rem] bg-white rounded-lg">
                            <h5 class="mb-[1rem]">Update a Blog: </h5>

                            <div class="flex bg-gray-200 w-full justify-between gap-2 p-1 rounded-lg">
                                @foreach (['English', 'Français', 'العربية'] as $language)
                                    <button @click="tab = '{{ $language }}'"
                                        :class="{ 'bg-white text-black': tab === '{{ $language }}', 'bg-transparent text-black': tab !== '{{ $language }}' }"
                                        type="button" class="w-1/2 rounded-md font-medium p-1">
                                        {{ $language }}
                                    </button>
                                @endforeach
                            </div>

                            <div class="flex flex-col gap-2 mt-[1rem]">
                                <div x-show="tab === 'English'">
                                    <div class="flex flex-col gap-y-[0.75rem]">
                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="title_en" class="w-full font-bolder text-base">Blog
                                                Title: </label>
                                            <input class="rounded w-full" type="text" id="title_en"
                                                placeholder="Title..." value="{{ $blog->title->en }}"
                                                name="title[en]" required>

                                        </div>

                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="description_en" class="w-full font-bolder text-base">Blog
                                                Description: </label>

                                            <div id="quill-editor_en" class="mb-3" style="height: 300px;"></div>
                                            <textarea rows="3" class="w-full hidden" name="description[en]" id="description_en">{{ $blog->description->en }}</textarea>
                                        </div>

                                    </div>
                                </div>


                                <div x-show="tab === 'Français'">
                                    <div class="flex flex-col gap-y-[0.75rem]">
                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="title_fr" class="text-base">Titre du Blog</label>
                                            <input class="rounded" type="text" placeholder="Titre..."
                                                name="title[fr]" id="title_fr" value="{{ $blog->title->fr }}"
                                                required>
                                        </div>

                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="description_fr" class="text-base">Description du Blog</label>

                                            <div id="quill-editor_fr" class="mb-3" style="height: 300px;"></div>
                                            <textarea rows="3" class="w-full hidden" name="description[fr]" id="description_fr">{{ $blog->description->fr }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div x-show="tab === 'العربية'">
                                    <div class="flex flex-col gap-y-[0.75rem]">
                                        <div class="flex flex-col gap-[0.5rem] text-end">
                                            <label for="title_ar" class="text-base">الاسم</label>
                                            <input class="rounded text-end" type="text" placeholder="...الاسم"
                                                name="title[ar]" id="title_ar" value="{{ $blog->title->ar }}"
                                                required>
                                        </div>

                                        <div class="flex flex-col gap-[0.5rem]">
                                            <label for="description_ar" class="text-base text-end">وصف الحدث</label>

                                            <div id="quill-editor_ar" class="mb-3" style="height: 300px;"></div>
                                            <textarea rows="3" class="w-full hidden" name="description[ar]" id="description_ar">{{ $blog->description->ar }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <p class="text-base m-0">Images</p>


                                    <label for="image"
                                        class="p-[0.75rem] cursor-pointer flex gap-2 items-center border-[1.5px] border-gray-500 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span id="imagesPlaceholder" class="text-base text-gray-500">
                                            upload images
                                        </span>
                                    </label>
                                    <input class="hidden" type="file" placeholder="image" accept="image/*"
                                        name="image" id="image">
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="bg-green-600 rounded px-5 py-2 text-white w-full">
                            Update Blog
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('description_en')) {
                var editor_en = new Quill('#quill-editor_en', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                header: [1, 2, 3, false]
                            }],
                            ['bold', 'underline', 'code', 'strike', { align: ['justify','center', 'right'] }],

                            ['link', {
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }]
                        ],
                    },
                });

                // i have no f idea what this is
                var desc_en = @json($blog->description->en);
                editor_en.clipboard.dangerouslyPasteHTML(desc_en);


                var quillEditor_en = document.getElementById('description_en');
                editor_en.on('text-change', function() {
                    quillEditor_en.value = editor_en.root.innerHTML;
                });
                quillEditor_en.addEventListener('input', function() {
                    editor_en.root.innerHTML = quillEditor_en.value;
                });
            }
            var quillEditor_en = document.getElementById('description_en');
            editor_en.on('text-change', function() {
                quillEditor_en.value = editor.root.innerHTML;
            });
            quillEditor_en.addEventListener('input', function() {
                editor_en.root.innerHTML = quillEditor_en.value;
            });


            if (document.getElementById('description_ar')) {
                var editor_ar = new Quill('#quill-editor_ar', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                header: [1, 2, 3, false]
                            }],
                            ['bold', 'underline', 'code', 'strike', { align: ['justify','center', 'right'] }],

                            ['link', {
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }]
                        ],
                    },
                });

                var desc_ar = @json($blog->description->ar);
                editor_ar.clipboard.dangerouslyPasteHTML(desc_ar);
                var quillEditor_ar = document.getElementById('description_ar');
                editor_ar.on('text-change', function() {
                    quillEditor_ar.value = editor_ar.root.innerHTML;
                });
                quillEditor_ar.addEventListener('input', function() {
                    editor_ar.root.innerHTML = quillEditor_ar.value;
                });
            }
            var quillEditor_ar = document.getElementById('description_ar');
            editor_ar.on('text-change', function() {
                quillEditor_ar.value = editor_ar.root.innerHTML;
            });
            quillEditor_ar.addEventListener('input', function() {
                editor_ar.root.innerHTML = quillEditor_ar.value;
            });

            // French Editor
            if (document.getElementById('description_fr')) {
                var editor_fr = new Quill('#quill-editor_fr', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                header: [1, 2, 3, false]
                            }],
                            ['bold', 'underline', 'code', 'strike', { align: ['justify','center', 'right'] }],

                            ['link', {
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }]
                        ],
                    },
                });

                var desc_fr = @json($blog->description->fr);
                editor_fr.clipboard.dangerouslyPasteHTML(desc_fr);
                var quillEditor_fr = document.getElementById('description_fr');
                editor_fr.on('text-change', function() {
                    quillEditor_fr.value = editor_fr.root.innerHTML;
                });
                quillEditor_fr.addEventListener('input', function() {
                    editor_fr.root.innerHTML = quillEditor_fr.value;
                });
            }
            var quillEditor_fr = document.getElementById('description_fr');
            editor_fr.on('text-change', function() {
                quillEditor_fr.value = editor_fr.root.innerHTML;
            });
            quillEditor_fr.addEventListener('input', function() {
                editor_fr.root.innerHTML = quillEditor_fr.value;
            });
        });
    </script>
</x-app-layout>
