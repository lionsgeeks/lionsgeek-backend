<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Contact Form') }}
        </h2>
    </x-slot>



    <div x-data='{
        sendMail: true,
        customEmails : {{ $customEmails }},
        id: null,
        showCc: false,
        showBcc: false,
        }'
        class="pt-12 md:px-10 px-4 ">
        <div class=" mx-auto ">
            <div class="bg-white min-h-[78vh] p-2 shadow-sm rounded">
                <div class="flex items-center justify-end">
                    <button x-show="!sendMail" x-on:click="sendMail = true; id=null"
                        class="bg-black text-white px-2 py-1 rounded">
                        Compose
                    </button>
                    <button x-show="sendMail" x-on:click="sendMail = false; id=null"
                        class="bg-red-600 text-white px-2 py-1 rounded">
                        Cancel
                    </button>
                </div>

                <div class="flex flex-col lg:flex-row justify-between gap-2">

                    {{-- Email Previews --}}
                    <div class="md:h-[466px]  overflow-y-auto">
                        @foreach ($customEmails->reverse() as $key => $message)
                            <div x-on:click='id = {{ $key }}; sendMail = false'
                                class="p-4 flex flex-col gap-y-2  text--700 w-full border-b hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center  gap-x-2 text-lg font-medium">
                                    <h1 class="text-[#13181a] font-bold">
                                        <h5 class="font-medium text-sm text-[#999b9c]">{{ $message->receiver }}
                                        </h5>
                                </div>
                                <div class=" flex justify-between">
                                    <div class="flex items-center gap-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#3d5563" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                                            <path fill-rule="evenodd"
                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                                        </svg>

                                        <p class="font-[600] text-sm text-[#3d5563]">
                                            {{ Str::limit($message->content, 50, '...') }}</p>
                                    </div>

                                    <p class="text-[#999b9c]">
                                        {{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>


                    {{-- Email Details --}}
                    <div x-show="id !== null && !sendMail" class="lg:w-2/3 w-full min-h-[78vh]  overflow-y-hidden">
                        <div class="w-full sm:flex flex-col gap-3 h-full px-4">
                            <div class=" px-6 pt-1 w-full h-[10%] flex justify-between items-center bg-white border-b">
                                <h1 x-text='customEmails[id].receiver' class="text-xl text-[#13181a] w-fit font-bold">
                                </h1>
                                <div class=" flex gap-3 justify-end items-center font-medium  ">
                                    <form :action="'{{ route('customEmail.destroy', '') }}' + '/' + customEmails[id].id"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="flex gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                            </div>
                            <div class="p-6 h-[85%] border flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between  border-b pb-2  ">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-[#999b9c] font-medium">From:</span>
                                            <p x-text='customEmails[id].sender == "default" ? "info@lionsgeek.ma" : customEmails[id].sender == "Coding" ? "coding@lionsgeek.ma" : "media@lionsgeek.ma"'
                                                class="font-medium text-[#13181a] ">
                                            </p>
                                        </div>
                                        <p class="text-[#999b9c] font-[500]"
                                            x-text="new Date(customEmails[id].created_at).toLocaleString('en-US', { month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false })">
                                        </p>
                                    </div>
                                    <p class="pt-4 overflow-y-auto max-h-[48vh]" x-text='customEmails[id].content'>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>



                    <form x-show="sendMail" class="w-full min-h-[78vh] flex flex-col gap-2"
                        action="{{ route('customEmail.store') }}" method="post">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>

                                <label for="sender" class="font-semibold">
                                    Sender:
                                </label>
                            </div>
                            <select name="sender" id="sender" class="rounded" required>
                                <option value="" selected disabled>Sender's Email</option>
                                <option value="default">info@lionsgeek.ma</option>
                                <option value="Coding">coding@lionsgeek.ma</option>
                                <option value="Media">media@lionsgeek.ma</option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>

                                    <label for="receiver" class="font-semibold">
                                        Receiver(s):
                                    </label>
                                </div>
                                <div>
                                    <button x-on:click="showCc = !showCc" type="button"
                                        class="hover:bg-gray-200 rounded px-1 transition-all duration-200">
                                        <span class="text-lg" x-text="showCc ? '-' : '+'"></span> Cc
                                    </button>

                                    <button x-on:click="showBcc = !showBcc" type="button"
                                        class="hover:bg-gray-200 rounded px-1 transition-all duration-200">
                                        <span class="text-lg" x-text="showBcc ? '-' : '+'"></span> Bcc
                                    </button>
                                </div>
                            </div>
                            <input required class="rounded"
                                placeholder="placeholder1@email.com, placeholder2@email.com" type="text"
                                name="receiver" id="receiver">
                        </div>

                        <div x-show="showCc" class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>

                                <label for="cc" class="font-semibold">
                                    Cc:
                                </label>
                            </div>
                            <input class="rounded" placeholder="placeholder1@email.com, placeholder2@email.com"
                                type="text" name="cc" id="cc">
                        </div>

                        <div x-show="showBcc" class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>

                                <label for="bcc" class="font-semibold">
                                    Bcc:
                                </label>
                            </div>
                            <input class="rounded" placeholder="placeholder1@email.com, placeholder2@email.com"
                                type="text" name="bcc" id="bcc">
                        </div>


                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <svg fill="#000000" height="15px" width="15px" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                    <path
                                        d="M46.5,0v139.6h23.3c0-23.3,0-69.8,23.3-93.1c23.2-23.3,46.5-23.3,69.8-23.3h46.5v395.6c0,34.9-11.6,69.8-46.5,69.8l-22.8,0
                                                l-0.5,23.2h232.7v-23.3h-23.3c-34.9,0-46.5-34.9-46.5-69.8V23.3h46.5c23.3,0,46.5,0,69.8,23.3s23.3,69.8,23.3,93.1h23.3V0H46.5z" />
                                </svg>

                                <label for="subject" class="font-semibold">
                                    Subject:
                                </label>
                            </div>
                            <input class="rounded" placeholder="Subject" type="text" name="subject"
                                id="subject">
                        </div>


                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>

                                <label for="content" class="font-semibold">Content: </label>
                            </div>
                            <textarea name="content" id="content" cols="30" rows="10" class="rounded" placeholder="Content"
                                required></textarea>
                        </div>

                        <button type="submit" class="w-full mt-2 py-2 bg-black rounded text-white flex items-center justify-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            Send Email
                        </button>
                    </form>
                </div>



            </div>

        </div>

    </div>
    </div>

</x-app-layout>
