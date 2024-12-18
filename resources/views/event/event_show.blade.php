<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Events Update') }}
        </h2>

        <form
        action="{{ route('events.destroy', $event) }}"
        method="post"
        enctype="multipart/form-data"
        onsubmit="this.submitBtn.disabled = true"
        class="flex flex-col items-center sm:items-start sm:flex-row"
    >
        @csrf
        @method('DELETE')
        <button
            name="submitBtn"
            type="submit"
            class="w-full sm:w-auto px-4 sm:px-6 text-white py-2 sm:py-3 font-bold rounded-md bg-red-500 hover:bg-red-600 transition-all"
        >
            Delete Event
        </button>
    </form>

    </x-slot>

    <div class="w-full min-h-screen flex flex-col overflow-y-auto">
        <div class="bg-slate-100 p-4 md:p-[2rem] gap-4 md:gap-[1.6rem] flex flex-col items-center overflow-y-auto w-full">
            <form class="flex flex-col items-center justify-center py-4 md:py-6 w-full bg-white rounded-[20px] gap-4 md:gap-5"
                action="{{ route('events.update', $event) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="text-[20px] md:text-[25px] font-bold">Update Event</p>

                <div x-data="{ tab: 'English' }" class="w-full flex flex-col items-center">
                    {{-- Language buttons --}}
                    <div class="flex items-center justify-center gap-2 p-2 w-full overflow-x-auto">
                        @foreach (['English', 'Français', 'العربية'] as $language)
                            <button type="button"
                                class="px-[1.5rem] md:px-[3rem] py-[0.5rem] bg-[#f3f4f6] w-[32%] rounded-[20px] whitespace-nowrap text-sm md:text-base"
                                @click="tab = '{{ $language }}' ">
                                {{ $language }}
                            </button>
                        @endforeach
                    </div>

                    <div class="flex flex-col gap-4 md:gap-5 w-full p-4 md:p-8 rounded-[20px]">
                        {{-- Name & Description & Location --}}
                        <div class="flex flex-col">
                            {{-- Date & Price Section --}}
                            <div class="flex flex-col md:flex-row gap-4 md:gap-x-6 justify-center w-full pb-5">
                                {{-- Date --}}
                                <div class="w-full md:w-[50%]">
                                    <label class="block mb-2">
                                        <p x-show="tab === 'English'">Date</p>
                                        <p x-show="tab === 'Français'">La date</p>
                                        <p x-show="tab === 'العربية'" class="text-end">التاريخ</p>
                                    </label>
                                    <input
                                        :placeholder="tab === 'Français' ? 'Enter la date' : tab === 'العربية' ? 'أدخل التاريخ' : 'Enter date'"
                                        class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                        type="datetime-local"
                                        name="date"
                                        required
                                        value="{{ $event->date }}"
                                        min="{{ now()->format('Y-m-d\TH:i') }}">
                                </div>

                                {{-- Price --}}
                                <div class="w-full md:w-[50%]">
                                    <label class="block mb-2">
                                        <p x-show="tab === 'English'">Price</p>
                                        <p x-show="tab === 'Français'">Prix</p>
                                        <p x-show="tab === 'العربية'" class="text-end">السعر</p>
                                    </label>
                                    <input
                                        required
                                        :placeholder="tab === 'Français' ? 'Enter le prix' : tab === 'العربية' ? 'أدخل السعر' : 'Enter price'"
                                        class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                        type="number"
                                        name="price"
                                        value="{{ $event->price }}"
                                        min="0"
                                        step="0.01">
                                </div>
                            </div>

                            {{-- Language Tabs Content --}}
                            {{-- English --}}
                            <div class="flex flex-col items-center w-full gap-4 md:gap-5" x-show="tab === 'English'">
                                <div class="flex flex-col md:flex-row justify-center gap-4 w-full">
                                    <div class="flex flex-col w-full md:w-[50%] gap-1">
                                        <label for="name_en">Name</label>
                                        <input required placeholder="Enter name"
                                            class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                            type="text" name="name[en]" id="name_en" value="{{ $event->name->en }}">
                                    </div>
                                    <div class="flex flex-col w-full md:w-[50%] gap-1">
                                        <label for="location_en">Location</label>
                                        <input required placeholder="Enter location"
                                            class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                            type="text" name="location[en]" id="location_en"
                                            value="{{ $event->location->en }}">
                                    </div>
                                </div>
                                <div class="flex flex-col w-full gap-1">
                                    <label for="description_en">Description</label>
                                    <textarea placeholder="Enter description" rows="5"
                                        class="w-full border-[2px] bg-transparent border-black rounded-[10px] p-2"
                                        name="description[en]" id="description_en">{{ $event->description->en }}</textarea>
                                </div>
                            </div>

                            {{-- Français --}}
                            <div class="flex flex-col items-center w-full gap-4 md:gap-5" x-show="tab === 'Français'">
                                <div class="flex flex-col md:flex-row justify-center gap-4 w-full">
                                    <div class="flex flex-col w-full md:w-[50%] gap-1">
                                        <label for="name_fr">Nom</label>
                                        <input required placeholder="Enter le nom"
                                            class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                            type="text" name="name[fr]" id="name_fr" value="{{ $event->name->fr }}">
                                    </div>
                                    <div class="flex flex-col w-full md:w-[50%] gap-1">
                                        <label for="location_fr">Localisation</label>
                                        <input required placeholder="Enter la localisation"
                                            class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                            type="text" name="location[fr]" id="location_fr"
                                            value="{{ $event->location->fr }}">
                                    </div>
                                </div>
                                <div class="flex flex-col w-full gap-1">
                                    <label for="description_fr">Description</label>
                                    <textarea placeholder="Enter la description" rows="5"
                                        class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                        name="description[fr]" id="description_fr">{{ $event->description->fr }}</textarea>
                                </div>
                            </div>

                            {{-- العربية --}}
                            <div class="flex flex-col items-center w-full gap-4 md:gap-5" x-show="tab === 'العربية'">
                                <div class="flex flex-col md:flex-row justify-center gap-4 w-full">
                                    <div class="flex flex-col w-full md:w-[50%] text-end gap-1">
                                        <label for="name_ar">الاسم</label>
                                        <input required placeholder="أدخل الاسم"
                                            class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                            type="text" name="name[ar]" id="name_ar" value="{{ $event->name->ar }}">
                                    </div>
                                    <div class="flex flex-col w-full md:w-[50%] text-end gap-1">
                                        <label for="location_ar">الموقع</label>
                                        <input required placeholder="أدخل الموقع"
                                            class="w-full border-[2px] border-black bg-transparent rounded-[10px] p-2"
                                            type="text" name="location[ar]" id="location_ar"
                                            value="{{ $event->location->ar }}">
                                    </div>
                                </div>
                                <div class="flex flex-col w-full text-end gap-1">
                                    <label for="description_ar">وصف النص</label>
                                    <textarea placeholder="أدخل الوصف" rows="5"
                                        class="w-full border-[2px] bg-transparent border-black rounded-[10px] p-2"
                                        name="description[ar]" id="description_ar">{{ $event->description->ar }}</textarea>
                                </div>
                            </div>
                        </div>

                         <!-- Cover -->
                         <div class="flex flex-col gap-1" x-data="{
                            selectedImage: '{{ asset('storage/images/'.$event->cover) }}',
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
                                <img class="w-full h-full object-cover rounded-[10px]" :src="selectedImage" alt="Selected Cover">
                            </div>
                        </div>
                        <button class="p-3 px-[2rem] md:px-[3rem] rounded-[10px] w-full bg-black text-white text-sm md:text-base">
                            Submit
                        </button>
                        {{-- Participants --}}
                        <div class="flex flex-col gap-3 w-full mt-6" x-data="{
                            searchQuery: '',
                            bookings: {{ $event->bookings }},
                            filteredBookings() {
                                return this.bookings.filter(b =>
                                    b.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                    b.email.toLowerCase().includes(this.searchQuery.toLowerCase())
                                );
                            }
                        }">
                            <p x-show="tab === 'English'" class="text-xl font-bold">Participants</p>
                            <p x-show="tab === 'Français'" class="text-xl font-bold">Participants</p>
                            <p x-show="tab === 'العربية'" class="text-xl font-bold text-end">المشاركين</p>

                            <div class="mb-4">
                                <input type="text" x-model="searchQuery"
                                    placeholder="Search participants..."
                                    class="px-4 py-2 border border-gray-300 rounded-[10px] w-full">
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left border border-gray-300 rounded-[10px]">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="px-2 md:px-4 py-2 font-medium text-gray-700 text-sm md:text-base">#</th>
                                            <th class="px-2 md:px-4 py-2 font-medium text-gray-700 text-sm md:text-base">Name</th>
                                            <th class="px-2 md:px-4 py-2 font-medium text-gray-700 text-sm md:text-base">Email</th>
                                            <th class="px-2 hidden md:block md:px-4 py-2 font-medium text-gray-700 text-sm md:text-base">Booked at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(booking, index) in filteredBookings()" :key="index">
                                            <tr class="border-t border-gray-300 hover:bg-gray-50 transition">
                                                <td class="px-2 md:px-4 py-2 text-gray-800 font-medium text-sm md:text-base" x-text="index + 1"></td>
                                                <td class="px-2 md:px-4 py-2 text-gray-800 text-sm md:text-base" x-text="booking.name"></td>
                                                <td class="px-2 md:px-4 py-2 text-gray-800 text-sm md:text-base" x-text="booking.email"></td>
                                                <td class="px-2 md:px-4 hidden md:block py-2 text-gray-800 text-sm md:text-base"
                                                    x-text="new Date(booking.created_at).toLocaleDateString('en-GB', {
                                                        year: 'numeric',
                                                        month: 'long',
                                                        day: 'numeric'
                                                    })">
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
