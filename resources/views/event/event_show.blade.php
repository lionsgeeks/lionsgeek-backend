@extends('layouts.index')

@section('content')
    <div class="flex">
        @include('layouts.sidebare')


        <div class="w-[100vw] h-[100vh] flex flex-col overflow-y-scroll">

            <div class="flex items-center justify-between py-[1.2rem] px-[1rem] w-[100%] bg-white  ">
                <p class="text-[25px] font-bold ">{{ $event->name->en }}</p>
                <form action="{{ route('events.destroy', $event) }}" method="post" enctype="multipart/form-data"
                    onsubmit="this.submitBtn.disabled = true ">
                    @csrf
                    @method('DELETE')
                    <button name="submitBtn" type="submit"
                        class="px-[2.2rem] py-[.8rem] font-bold rounded-[14px] bg-red-500 ">Delete resource</button>
                </form>
            </div>

            <div class="bg-slate-100 p-[2rem] gap-[1.6rem] flex flex-col items-center overflow-y-scroll w-[100%]">

                {{-- <img class="w-[50%] bg-yellow-50  " src="{{ asset("storage/images/".$event->cover) }}" alt=""> --}}
                <form class="flex flex-col items-center justify-center py-6 w-[100%] bg-white rounded-[20px] gap-5 "
                    action="{{ route('events.update', $event) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p class="text-[25px] font-bold">Update Event</p>

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
                                        <label for="name_en">Name</label>
                                        <input required placeholder="Enter name"
                                            class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]"
                                            type="text" name="name[en]" id="name_en" value="{{ $event->name->en }}">
                                    </div>
                                    <div class="flex flex-col w-[100%]  gap-1 ">
                                        <label for="description_en">Description</label>
                                        <textarea placeholder="Enter description" rows="5"
                                            class="w-[100%] border-[2px] bg-slate-100 border-black rounded-[10px]" type="text" name="description[en]"
                                            id="description_en">{{ $event->description->en }}</textarea>
                                    </div>
                                    <div class="flex flex-col w-[100%] gap-1">
                                        <label for="description_en">Location</label>
                                        <input required placeholder="Enter location"
                                            class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]"
                                            type="text" name="location[en]" id="description_en"
                                            value="{{ $event->location->en }}">
                                    </div>
                                </div>

                                {{-- Français --}}
                                <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'Français' ">
                                    <div class="flex flex-col w-[100%] gap-1">
                                        <label for="name_fr">Nom</label>
                                        <input required placeholder="Enter le nom"
                                            class=" border-[2px] border-black bg-slate-100 rounded-[10px]" type="text"
                                            name="name[fr]" id="name_fr" value="{{ $event->name->fr }}">
                                    </div>
                                    <div class="flex flex-col  w-[100%] gap-1">
                                        <label for="description_fr">Description</label>
                                        <textarea placeholder="Enter la description" rows="5"
                                            class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]" type="text" name="description[fr]"
                                            id="description_fr">{{ $event->description->fr }}</textarea>
                                    </div>
                                    <div class="flex flex-col w-[100%]  gap-1">
                                        <label for="location_fr">Localisation</label>
                                        <input required placeholder="Enter la localisation"
                                            class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]"
                                            type="text" name="location[fr]" value="{{ $event->location->fr }}"
                                            id="location_fr">
                                    </div>
                                </div>

                                {{-- العربية --}}
                                <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'العربية' ">
                                    <div class="flex flex-col  w-[100%] text-end gap-1">
                                        <label for="name_ar">الاسم</label>
                                        <input required placeholder="أدخل الاسم"
                                            class=" border-[2px] border-black bg-slate-100 rounded-[10px]" type="text"
                                            name="name[ar]" id="name_ar" value="{{ $event->name->ar }}">
                                    </div>
                                    <div class="flex flex-col w-[100%]  text-end gap-1">
                                        <label for="description_ar">وصف النص</label>
                                        <textarea placeholder="أدخل الوصف" class="w-[100%] border-[2px] bg-slate-100 border-black rounded-[10px]" rows="5"
                                            type="text" name="description[ar]" id="description_ar">{{ $event->description->ar }}</textarea>
                                    </div>
                                    <div class="flex flex-col w-[100%] text-end gap-1">
                                        <label for="location_ar">الموقع</label>
                                        <input required placeholder="أدخل الموقع"
                                            class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]"
                                            type="text" name="location[ar]" id="location_ar"
                                            value="{{ $event->location->ar }}">
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
                                    :placeholder="tab === 'Français' ? 'Enter la date' : tab === 'العربية' ? 'أدخل التاريخ' :
                                        'Enter date'"
                                    class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]"
                                    type="datetime-local" name="date" id="" required
                                    value="{{ $event->date }}" min="{{ now()->format('Y-m-d\TH:i') }}">
                            </div>

                            {{-- Price --}}

                            <div class="">
                                <label for="">
                                    <p x-show="tab === 'English' ">Price</p>
                                    <p x-show="tab === 'Français' ">Prix</p>
                                    <p x-show="tab === 'العربية' " class="text-end">السعر</p>
                                </label>
                                <input required
                                    :placeholder="tab === 'Français' ? 'Enter le prix' : tab === 'العربية' ? 'أدخل السعر' :
                                        'Enter price'"
                                    class="w-[100%] border-[2px] border-black bg-slate-100 rounded-[10px]" type="number"
                                    name="price" value="{{ $event->price }}" id="" min="0"
                                    step="0.01">
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
                                    <input name="cover"
                                        accept="image/*" type="file"
                                        class="w-full rounded-lg h-full absolute top-0 opacity-0 cursor-pointer z-30">
                                    <img class="w-full h-full object-cover rounded-lg "
                                        src="{{ asset("storage/images/".$event->cover) }}"alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="p-3 px-[3rem] rounded-[14px] bg-black text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
