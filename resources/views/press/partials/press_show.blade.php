<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ $press->name->en }}
        </h2>

        <form action="{{ route('press.destroy', $press) }}" method="post" enctype="multipart/form-data"
        onsubmit="this.submitBtn.disabled = true ">
        @csrf
        @method('DELETE')
        <button name="submitBtn" type="submit"
            class="px-4 py-2 font-bold rounded-[14px] bg-red-500 ">Delete
            resource</button>
    </form>
    </x-slot>
    <div class="flex flex-col ">

        <div class="bg-slate-100 p-[2rem] gap-[1.6rem] flex flex-col items-center overflow-y-scroll w-[100%]">

            {{-- <img class="w-[50%] bg-yellow-50  " src="{{ asset("storage/images/".$event->cover) }}" alt=""> --}}
            <form class="flex flex-col items-center justify-center py-6 w-[100%] bg-white rounded-[20px] gap-5 "
                action="{{ route('press.update', $press) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="text-[25px] font-bold">Update Press</p>

                <div x-data="{ tab: 'English' }" class="w-[100%]  flex flex-col items-center ">
                    {{-- Language buttons --}}
                    <div class="flex items-center justify-center gap-2 p-2 w-[100%] bg-slate-200 rounded">
                        @foreach (['English', 'Français', 'العربية'] as $language)
                            <button type="button"
                                :class="{ 'bg-black text-white': tab === '{{ $language }}', 'bg-slate-200 text-black': tab !== '{{ $language }}' }"
                                class="w-1/3 rounded-md font-medium p-1" @click="tab = '{{ $language }}' ">
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
                            <div class="">
                                <p x-show="tab=== 'English' " class="">link</p>
                                <p x-show="tab=== 'Français' " class="">lien</p>
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

                        <div class="flex flex-col gap-1">
                            <div class="">
                                <p x-show="tab=== 'English' " class="">Cover</p>
                                <p x-show="tab=== 'Français' " class="">Couverture</p>
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
                        </div>

                    </div>
                </div>
                <button class="p-3 px-[3rem] rounded-[14px] bg-black text-white">Submit</button>
            </form>
        </div>
    </div>

</x-app-layout>
