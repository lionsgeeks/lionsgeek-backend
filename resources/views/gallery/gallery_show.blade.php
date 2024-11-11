@extends('layouts.index')

@section('content')
    <div class="flex">
        @include('layouts.sidebare')


        <div class="w-[84vw] h-[100vh] flex flex-col overflow-y-scroll">
            <div class="flex items-center justify-between py-[1.2rem] px-[1rem] w-[100%] bg-white  ">
                <p class="text-[25px] font-bold ">{{ $gallery->title->en }}</p>
                <form action="{{ route('gallery.destroy', $gallery) }}" method="post" enctype="multipart/form-data" onsubmit="this.submitButton.disabled =true" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submitButton" class="px-[2.2rem] py-[.8rem] font-bold rounded-[14px] bg-red-500 ">Delete resource</button>
                </form>
            </div>

            <div class="flex w-[100%] bg-slate-100 ">
                <div class=" p-[2rem] gap-[1.6rem] flex flex-col items-center  w-[65%]">
                    <img class="w-[50%] bg-yellow-50  " src="{{ asset('storage/images/' . $gallery->couverture) }}"
                        alt="">
                    <form class="flex flex-col items-center justify-center py-6 w-[100%] bg-white rounded-[20px] gap-5 "
                        action="{{ route('gallery.update', $gallery) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p class="text-[25px] font-bold">Update Gallery</p>

                        <div x-data="{ tab: 'English' }" class="w-[100%]  flex flex-col items-center ">
                            {{-- Language buttons --}}
                            <div class="flex items-center justify-center gap-2 p-2 w-[100%] ">
                                @foreach (['English', 'Français', 'العربية'] as $language)
                                    <button type="button" class="px-[3rem] py-[0.5rem] bg-slate-100 rounded-[20px]"
                                        @click="tab = '{{ $language }}' ">
                                        {{ $language }}
                                    </button>
                                @endforeach
                            </div>

                            <div class="Tabs flex flex-col gap-5 w-[100%]  p-8 rounded-[20px]">

                                {{-- Name & Description & Location --}}

                                <div class="flex flex-col">
                                    {{-- English --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'English' ">
                                        <div class="flex flex-col w-[100%]  gap-1">
                                            <label for="title_en">Title</label>
                                            <input required placeholder="Enter title"
                                                class="w-[100%] bg-slate-100 border-[2px] border-black rounded-[10px]"
                                                type="text" name="title[en]" id="title_en"
                                                value="{{ $gallery->title->en }}">
                                        </div>
                                        <div class="flex flex-col w-[100%]  gap-1 ">
                                            <label for="description_en">Description</label>
                                            <textarea placeholder="Enter description" rows="5"
                                                class="w-[100%] bg-slate-100 border-[2px] border-black rounded-[10px]" type="text" name="description[en]"
                                                id="description_en">{{ $gallery->description->en }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Français --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'Français' ">
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="name_fr">Titre</label>
                                            <input required placeholder="Enter le Titre"
                                                class=" bg-slate-100 border-[2px] border-black rounded-[10px]"
                                                type="text" name="title[fr]" id="name_fr"
                                                value="{{ $gallery->title->fr }}">
                                        </div>
                                        <div class="flex flex-col  w-[100%] gap-1">
                                            <label for="description_fr">Description</label>
                                            <textarea placeholder="Enter la description" rows="5"
                                                class="w-[100%] bg-slate-100 border-[2px] border-black rounded-[10px]" type="text" name="description[fr]"
                                                id="description_fr">{{ $gallery->description->fr }}</textarea>
                                        </div>
                                    </div>

                                    {{-- العربية --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'العربية' ">
                                        <div class="flex flex-col  w-[100%] text-end gap-1">
                                            <label for="name_ar">الاسم</label>
                                            <input required placeholder="أدخل العنوان"
                                                class=" border-[2px] bg-slate-100 border-black rounded-[10px]"
                                                type="text" name="title[ar]" id="name_ar"
                                                value="{{ $gallery->title->ar }}">
                                        </div>
                                        <div class="flex flex-col w-[100%]  text-end gap-1">
                                            <label for="description_ar">وصف النص</label>
                                            <textarea placeholder="أدخل الوصف" class="w-[100%] border-[2px] bg-slate-100 border-black rounded-[10px]" rows="5"
                                                type="text" name="description[ar]" id="description_ar">{{ $gallery->description->ar }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Cover --}}

                                <div class="flex flex-col gap-1">
                                    <div class="">
                                        <p x-show="tab=== 'English' " class="">Cover</p>
                                        <p x-show="tab=== 'Français' " class="">Couverture</p>
                                        <p x-show="tab=== 'العربية' " class="text-end">الغطاء</p>
                                    </div>
                                    <label for="image"
                                        class="p-[0.75rem] cursor-pointer flex gap-2 items-center  border-[2px] border-black bg-slate-100 rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span id="imagesPlaceholder" class="text-base text-gray-500">
                                            upload new Cover (optional)
                                        </span>
                                    </label>
                                    <input
                                        onchange="imagesPlaceholder.textContent = [...this.files].map(f => f.name).join(', ')"
                                        class="hidden" type="file" placeholder="image"
                                        accept="image/png, image/jpg, image/jpeg" name="couverture" id="image"
                                        value="{{ $gallery->couverture }}">
                                </div>

                            </div>

                        </div>
                        <button type="submit" class="p-3 px-[3rem] rounded-[14px] bg-black text-white">Submit</button>
                    </form>
                </div>
                <div class="w-[35%] min-h-[100vh] p-[2rem] flex flex-col ">
                    <div class= "flex flex-wrap justify-between gap-y-3 bg-white p-[1rem] rounded-[20px]">
                        <div onclick="storeImage.click()"
                            class="w-[48%] h-fit aspect-square border-dashed border-slate-100 border-[2px] rounded  cursor-pointer ">
                            
                            <form class="flex flex-col gap-1 items-center justify-center h-[100%] w-[100%%]"
                                action="{{ route('images.store', $gallery) }}" method="post"
                                enctype="multipart/form-data" onsubmit="this.submitButton.disabled = true" >
                                @csrf
                                <p class="">Add image</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <input type="hidden" name="id" value="{{ $gallery->id }}">
                                <input type="hidden" name="type" value="gallery">
                                <input onchange="addImgBtn.click()" multiple name="images[]" type="file"
                                    id="storeImage" accept="image/png, image/jpeg" multiple
                                    class="mt-2 border-2 rounded w-full bg-white hidden">
                                <button type="submit" name="submitButton" class="hidden" id="addImgBtn">confirm</button>
                            </form>

                        </div>
                        @foreach ($gallery->images as $image)
                            <form action="{{ route('images.destroy', $image) }}" method="post" class="w-[48%] h-fit" onsubmit="this.submitButton.disabled = true" >
                                @csrf
                                @method('DELETE')
                                <div class="w-[100%] relative group">
                                    <img class="w-[100%] group-hover:opacity-50 transition duration-300 aspect-square object-cover rounded border"
                                        src="{{ asset('storage/images/' . $image->path) }}" alt="">
                                    <button
                                        name="submitButton" type="submit"
                                        class="w-[100%] h-[100%]  absolute inset-0 items-center justify-center hidden group-hover:flex transition duration-300 ">
                                        <svg class=" w-[30%] rounded bg-red-600 " xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
