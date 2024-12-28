<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="flex flex-col items-center justify-center py-6 w-[100%] bg-white p-2 rounded gap-5"
                        action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
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
                                {{-- Name & Description & Location --}}
                                <div class="flex flex-col">
                                    {{-- English --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'English' ">
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="name_en">Name</label>
                                            <input placeholder="Enter name" required
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="name[en]" id="name_en" value="{{ old('name.en') }}">
                                        </div>
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="description_en">Description</label>
                                            <textarea placeholder="Enter description" required rows="5"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="description[en]" id="description_en">{{ old('description.en') }}</textarea>
                                        </div>
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="location_en">Location</label>
                                            <input placeholder="Enter location"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="location[en]" id="location_en" required
                                                value="{{ old('location.en') }}">
                                        </div>
                                    </div>

                                    {{-- Français --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'Français' ">
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="name_fr">Nom</label>
                                            <input required placeholder="Enter le nom"
                                                class="border-[2px] border-black rounded-[10px]" type="text"
                                                name="name[fr]" id="name_fr" value="{{ old('name.fr') }}">
                                        </div>
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="description_fr">Description</label>
                                            <textarea required placeholder="Enter la description" rows="5"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="description[fr]" id="description_fr">{{ old('description.fr') }}</textarea>
                                        </div>
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="location_fr">Localisation</label>
                                            <input required placeholder="Enter la localisation"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="location[fr]" id="location_fr" value="{{ old('location.fr') }}">
                                        </div>
                                    </div>

                                    {{-- العربية --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'العربية' ">
                                        <div class="flex flex-col w-[100%] text-end gap-1">
                                            <label for="name_ar">الاسم</label>
                                            <input required placeholder="أدخل الاسم"
                                                class="border-[2px] border-black rounded-[10px]" type="text"
                                                name="name[ar]" id="name_ar" value="{{ old('name.ar') }}">
                                        </div>
                                        <div class="flex flex-col w-[100%] text-end gap-1">
                                            <label for="description_ar">وصف النص</label>
                                            <textarea required placeholder="أدخل الوصف"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" rows="5"
                                                type="text" name="description[ar]"
                                                id="description_ar">{{ old('description.ar') }}</textarea>
                                        </div>
                                        <div class="flex flex-col w-[100%] text-end gap-1">
                                            <label for="location_ar">الموقع</label>
                                            <input required placeholder="أدخل الموقع"
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="location[ar]" id="location_ar" value="{{ old('location.ar') }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Date --}}
                                <div class="">
                                    <label for="">
                                        <p x-show="tab === 'English' ">Date</p>
                                        <p x-show="tab === 'Français' ">La date</p>
                                        <p x-show="tab === 'العربية' " class="text-end">التاريخ</p>
                                    </label>
                                    <input
                                        :placeholder="tab === 'Français' ? 'Enter la date' : tab === 'العربية' ? 'أدخل التاريخ' : 'Enter date'"
                                        class="w-[100%] border-[2px] border-black rounded-[10px]" type="datetime-local"
                                        name="date" required id="" min="{{ now()->format('Y-m-d\TH:i') }}">
                                </div>

                                {{-- Price --}}
                                <div class="">
                                    <label for="">
                                        <p x-show="tab === 'English' ">Price</p>
                                        <p x-show="tab === 'Français' ">Prix</p>
                                        <p x-show="tab === 'العربية' " class="text-end">السعر</p>
                                    </label>
                                    <input
                                        :placeholder="tab === 'Français' ? 'Enter le prix' : tab === 'العربية' ? 'أدخل السعر' : 'Enter price'"
                                        class="w-[100%] border-[2px] border-black rounded-[10px]" type="number"
                                        name="price" required value="{{ old('price') }}" id="" min="0"
                                        step="0.01">
                                </div>

                                {{-- Cover --}}
                                <div class="flex flex-col gap-1">
                                    <div class="">
                                        <p x-show="tab=== 'English' " class="">Cover</p>
                                        <p x-show="tab=== 'Français' " class="">Couverture</p>
                                        <p x-show="tab=== 'العربية' " class="text-end">الغطاء</p>
                                    </div>
                                    <label for="image"
                                        class="p-[0.75rem] cursor-pointer flex gap-2 items-center border-[2px] border-black rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span id="imagesPlaceholder" class="text-base text-gray-500">
                                            upload cover
                                        </span>
                                    </label>
                                    <input onchange="imagesPlaceholder.textContent = [...this.files].map(f => f.name).join(', ')"
                                        class="hidden" required type="file" placeholder="image"
                                        accept="image/png, image/jpg, image/jpeg" name="cover" id="image">
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 w-full">
                            {{-- hadi butona dyal translate  --}}

                            {{-- <button type="button" onclick="translateFields()"
                                class="bg-black hover:bg-alpha hover:text-black text-white rounded py-2 px-4 transition-colors">
                                Translate 
                            </button> --}}
                            <button type="submit" class="bg-black flex-1 text-white rounded py-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="translationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center space-x-3">
                <div class="w-6 h-6 border-2 border-t-2 border-blue-500 rounded-full animate-spin"></div>
                <p>Translating...</p>
            </div>
        </div>
    </div>

    <script>
        async function translateFields() {
            const nameEn = document.getElementById('name_en').value;
            const descriptionEn = document.getElementById('description_en').value;
            const locationEn = document.getElementById('location_en').value;
    
            if (!nameEn && !descriptionEn && !locationEn) {
                alert('Please fill in at least one English field to translate');
                return;
            }
    
            const modal = document.getElementById('translationModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
    
            try {
                const data = {
                    name: { en: nameEn },
                    description: { en: descriptionEn },
                    location: { en: locationEn }
                };
    
                const response = await fetch('{{ route('event.translate') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                });
                console.log(response);
                
                if (!response.ok) {
                    throw new Error('Translation failed');
                }
    
                const result = await response.json();
                console.log(result.data);
                console.log(result.data.ar.name);
                console.log(result.data.fr.name);
                
                document.getElementById('name_ar').value = result.data.ar.name || '';
                document.getElementById('description_ar').value = result.data.ar.description || '';
                document.getElementById('location_ar').value = result.data.ar.location || '';
                document.getElementById('name_fr').value = result.data.fr.name || '';
                document.getElementById('description_fr').value = result.data.fr.description || '';
                document.getElementById('location_fr').value = result.data.fr.location || '';

            // } catch (error) {
                alert('An error occurred while translating: ' + error.message + "please try again");
            } finally {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }
    </script>
    
</x-app-layout>