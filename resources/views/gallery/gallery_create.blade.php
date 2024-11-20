<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Gallery') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="flex flex-col items-center justify-center py-6 w-[100%] bg-white p-2 rounded gap-5  "
                        action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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

                            <div class="Tabs flex flex-col gap-5 w-[100%] p-4">

                                {{-- Title & Description --}}

                                <div class="flex flex-col">
                                    {{-- English --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'English' ">
                                        <div class="flex flex-col w-[100%]  gap-1">
                                            <label for="title_en">Title</label>
                                            <input placeholder="Enter title" required
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="title[en]" id="title_en" value="{{ old('title.en') }}">
                                        </div>

                                        <div class="flex flex-col w-[100%]  gap-1 ">
                                            <label for="description_en">Description</label>
                                            <textarea placeholder="Enter description" required rows="5"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text" name="description[en]" id="description_en">{{ old('description.en') }}</textarea>
                                        </div>

                                    </div>

                                    {{-- Français --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'Français' ">
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="title_fr">Titre</label>
                                            <input required placeholder="Enter le Titre"
                                                class=" border-[2px] border-black rounded-[10px]" type="text"
                                                name="title[fr]" id="title_fr" value="{{ old('title.fr') }}">
                                        </div>
                                        <div class="flex flex-col  w-[100%] gap-1">
                                            <label for="description_fr">Description</label>
                                            <textarea required placeholder="Enter la description" rows="5"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text" name="description[fr]" id="description_fr">{{ old('description.fr') }}</textarea>
                                        </div>
                                    </div>

                                    {{-- العربية --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'العربية' ">
                                        <div class="flex flex-col  w-[100%] text-end gap-1">
                                            <label for="title_ar">العنوان</label>
                                            <input required placeholder="أدخل العنوان"
                                                class=" border-[2px] border-black rounded-[10px]" type="text"
                                                name="title[ar]" id="title_ar" value="{{ old('title.ar') }}">
                                        </div>
                                        <div class="flex flex-col w-[100%]  text-end gap-1">
                                            <label for="description_ar">وصف النص</label>
                                            <textarea required placeholder="أدخل الوصف" class="w-[100%] border-[2px] border-black rounded-[10px]" rows="5"
                                                type="text" name="description[ar]" id="description_ar">{{ old('description.ar') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Cover --}}

                                <div class="flex flex-col gap-1">
                                    <div class="">
                                        <p x-show="tab === 'English' " class="">Cover</p>
                                        <p x-show="tab === 'Français' " class="">Couverture</p>
                                        <p x-show="tab === 'العربية' " class="text-end">الغطاء</p>
                                    </div>
                                    <label for="image"
                                        class="p-[0.75rem] cursor-pointer flex gap-2 items-center  border-[2px] border-black rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span id="imagesPlaceholder" class="text-base text-gray-500">
                                            upload images
                                        </span>
                                    </label>
                                    <input
                                        onchange="imagesPlaceholder.textContent = [...this.files].map(f => f.name).join(', ')"
                                        class="hidden" required type="file" placeholder="image"
                                        accept="image/png, image/jpg, image/jpeg" name="couverture" id="image">
                                </div>

                                {{-- Gallery --}}

                                <div class="flex flex-col gap-1">
                                    <div class="">
                                        <p x-show="tab === 'English' " class="">Gallery</p>
                                        <p x-show="tab === 'Français' " class="">Galerie</p>
                                        <p x-show="tab === 'العربية' " class="text-end">الصور</p>
                                    </div>
                                    <label for="images"
                                        class="p-[0.75rem] cursor-pointer flex gap-2 items-center  border-[2px] border-black rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span id="imagesPlaceholder" class="text-base text-gray-500">
                                            upload images
                                        </span>
                                    </label>
                                    <input
                                        onchange="imagesPlaceholder.textContent = [...this.files].map(f => f.name).join(', ')"
                                        class="hidden" type="file" placeholder="image" multiple
                                        accept="image/png, image/jpg, image/jpeg" name="images[]" id="images">
                                </div>

                            </div>

                        </div>

                        <button class="bg-black w-full text-white rounded py-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
