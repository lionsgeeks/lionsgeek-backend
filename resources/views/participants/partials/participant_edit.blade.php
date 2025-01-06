<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Editing {{ $participant->full_name }}'s profile
        </h2>
    </x-slot>

    <div class="sm:px-6 lg:px-8 my-4">
        <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('participants.update', $participant) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex items-center gap-3">
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-semibold" for="full_name">Full Name:</label>
                            <input type="text" name="full_name" id="full_name" class="rounded" required
                                value="{{ old('full_name', $participant->full_name) }}">
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-semibold" for="birthday">Birthday:</label>
                            <input type="date" name="birthday" id="birthday" required class="rounded"
                                value="{{ old('birthday', $participant->birthday) }}">
                        </div>
                    </div>
                    <br>

                    <div class="flex items-center gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-semibold" for="email">Email:</label>
                            <input type="email" name="email" id="email" required class="rounded"
                                value="{{ old('email', $participant->email) }}">
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-semibold" for="phone">Phone: </label>
                            <input type="tel" name="phone" id="phone" required class="rounded"
                                value="{{ old('phone', $participant->phone) }}">
                        </div>
                    </div>


                    <br>
                    <div class="flex items-center gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-semibold" for="city">City:</label>
                            <input type="text" name="city" id="city" required class="rounded capitalize"
                                value="{{ old('city', $participant->city) }}">
                        </div>

                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-semibold" for="prefecture">Prefecture:</label>
                            <input type="text" name="prefecture" id="prefecture" required class="rounded capitalize"
                                value="{{ old('prefecture', str_replace('_', ' ', $participant->prefecture)) }}">
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2 w-full">
                        <label class="font-semibold" for="session">Session:</label>
                        <select name="session" id="session" class="rounded capitalize">
                            <option selected disabled value="">{{$participant->infoSession->formation}} {{$participant->infoSession->name}}</option>
                            @foreach ($sessions as $session)
                                <option value="{{$session->id}}">
                                    {{$session->formation}} {{$session->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <br>
                    <div class="flex items-center gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-semibold" for="city">Motivation:</label>
                            <textarea rows="10"  required class="rounded capitalize">{{ $participant->motivation }}</textarea>
                        </div>
                    </div> --}}
                    <br>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold">Profile Image:</p>
                        <label for="image"
                            class="w-full p-2 rounded cursor-pointer font-bold border border-black  text-base flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            Upload Image
                        </label>
                        <input id="image" name="image" class="rounded w-full hidden" type="file"
                            value="{{ old('image', $participant->image) }}" accept="image/*">
                    </div>
                    <br>
                    <button type="submit" class="w-full bg-black text-white rounded py-2">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
