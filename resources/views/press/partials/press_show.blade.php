    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight">
                {{ $press->name->en }}
            </h2>

            <form id="deleteform" action="{{ route('press.destroy', $press) }}" method="post" enctype="multipart/form-data"
                onsubmit="this.submitBtn.disabled = true ">
                @csrf
                @method('DELETE')
                
            </form>
        </x-slot>
        <div class="flex flex-col ">

            <div class="bg-slate-100 p-[2rem] gap-[1.6rem] flex flex-col items-center overflow-y-scroll w-[100%]">

                {{-- <img class="w-[50%] bg-yellow-50  " src="{{ asset("storage/images/".$event->cover) }}" alt=""> --}}
                <form id="updateform"  class="flex flex-col items-center justify-center py-6 w-full bg-white rounded-[20px] gap-5 "
                action="{{ route('press.update', $press) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex justify-end gap-x-4 px-5 w-full">
                    <button form="updateform" class=" px-4 py-2  rounded-lg bg-black text-white">Submit</button>
                    <button form="deleteform" type="submit" class="px-4 py-2 font-semibold rounded-lg bg-red-500 text-white">Delete resource</button>
                </div>
                <p class="text-[25px] font-bold">Update Press</p>

                    <div x-data="{ tab: 'English' }" class="w-full flex flex-col items-center">
                        {{-- Language buttons --}}
                        <div
                            class=" bg-gray-200  rounded-lg flex items-center justify-center gap-2 p-2 w-[95%] overflow-x-auto">
                            @foreach (['English', 'Français', 'العربية'] as $language)
                                <button @click="tab = '{{ $language }}'"
                                    :class="{ 'bg-white text-black': tab === '{{ $language }}', 'bg-transparent text-black': tab !== '{{ $language }}' }"
                                    type="button" class="w-1/2 rounded-md font-medium p-1">
                                    {{ $language }}
                                </button>
                            @endforeach
                        </div>

                        <div class="Tabs flex flex-col gap-5 w-[100%]  p-8 rounded-[20px]">

                            {{-- Name  --}}

                            <div class="flex flex-col">
                                {{-- English --}}
                                <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'English' ">
                                    <div class="flex flex-col w-[100%]  gap-1">
                                        <label for="name_en">Name</label>
                                        <input required placeholder="Enter name"
                                            class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]"
                                            type="text" name="name[en]" id="name_en" value="{{ $press->name->en }}">
                                    </div>
                                </div>

                                {{-- Français --}}
                                <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'Français' ">
                                    <div class="flex flex-col w-[100%] gap-1">
                                        <label for="name_fr">Nom</label>
                                        <input required placeholder="Enter le nom"
                                            class=" border-[2px] border-black bg-slate-100 rounded-[10px]" type="text"
                                            name="name[fr]" id="name_fr" value="{{ $press->name->fr }}">
                                    </div>
                                </div>

                                {{-- العربية --}}
                                <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'العربية' ">
                                    <div class="flex flex-col  w-[100%] text-end gap-1">
                                        <label for="name_ar">الاسم</label>
                                        <input required placeholder="أدخل الاسم"
                                            class=" border-[2px] border-black bg-slate-100 rounded-[10px]" type="text"
                                            name="name[ar]" id="name_ar" value="{{ $press->name->ar }}">
                                    </div>
                                </div>
                            </div>

                            {{-- link --}}
                            <div class="flex flex-col gap-1">
                                <div>
                                    <p x-show="tab=== 'English' ">link</p>
                                    <p x-show="tab=== 'Français' ">lien</p>
                                    <p x-show="tab=== 'العربية' " class="text-end">رابط</p>
                                </div>
                                <input x-show="tab=== 'Français' " name="link" required type="url"
                                    value="{{ $press->link }}" placeholder="Entrez le lien"
                                    class="border-[2px] border-black rounded-[10px]">
                                <input x-show="tab=== 'العربية' " name="link" required type="url"
                                    value="{{ $press->link }}" placeholder="أدخل الرابط"
                                    class="border-[2px] border-black rounded-[10px]">
                                <input x-show="tab=== 'English' " name="link" required type="url"
                                    value="{{ $press->link }}" placeholder="Enter link"
                                    class="border-[2px] border-black rounded-[10px]">
                            </div>
                            {{-- Cover --}}
                            {{-- 
                            <div class="flex flex-col gap-1">
                                <div>
                                    <p x-show="tab=== 'English' ">Cover</p>
                                    <p x-show="tab=== 'Français' ">Couverture</p>
                                    <p x-show="tab=== 'العربية' " class="text-end">الغطاء</p>
                                </div>
                                <div class="h-96 relative rounded-lg flex items-center justify-center">
                                    <h1 class="text-white absolute font-semibold z-30">+ Update the cover</h1>
                                    <div class="w-full h-full bg-black/50 absolute top-0 z-20 rounded-lg"></div>
                                    <input name="cover" accept="image/*" type="file"
                                        class="w-full rounded-lg h-full absolute top-0 opacity-0 cursor-pointer z-30">
                                    <img class="w-full h-full object-cover rounded-lg "
                                        src="{{ asset('storage/images/press/' . $press->cover) }}"alt="">
                                </div>
                            </div> --}}
                            <div class="flex flex-col gap-1" x-data="{
                                selectedImage: '{{ asset('storage/images/press/' . $press->cover) }}',
                                updateImage(event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        this.selectedImage = URL.createObjectURL(file);
                                    }
                                }
                            }">
                                <div>
                                    <p x-show="tab === 'English'" class="">Cover</p>
                                    <p x-show="tab === 'Français'" class="">Couverture</p>
                                    <p x-show="tab === 'العربية'" class="text-end">الغطاء</p>
                                </div>
                                <div class="h-48 md:h-96 relative rounded-[10px] flex items-center justify-center">
                                    <h1 class="text-white absolute font-semibold z-30">+ Update the cover</h1>
                                    <div class="w-full h-full bg-black/50 absolute top-0 z-20 rounded-[10px]"></div>
                                    <input name="cover" accept="image/*" type="file"
                                        class="w-full rounded-[10px] h-full absolute top-0 opacity-0 cursor-pointer z-30"
                                        @change="updateImage">
                                    <img class="w-full h-full object-cover rounded-[10px]" :src="selectedImage"
                                        alt="Selected Cover">
                                </div>
                            </div>

                            {{-- Logo --}}
                            <div class="flex flex-col gap-1">
                                <div>
                                    <p x-show="tab=== 'English' ">Logo</p>
                                    <p x-show="tab=== 'Français' ">Logo</p>
                                    <p x-show="tab=== 'العربية' " class="text-end">الشعار</p>
                                </div>
                                <label for="logo"
                                    class="p-[0.75rem] cursor-pointer flex gap-2 items-center  border-[2px] border-black rounded-[10px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="text-base text-gray-500">
                                        Upload Logo
                                    </span>
                                </label>
                                <input class="hidden" type="file" placeholder="logo"
                                    accept="image/png, image/jpg, image/jpeg" name="logo" id="logo">
                            </div>

                        </div>
                    </div>
                  
                </form>
            </div>
        </div>

    </x-app-layout>
