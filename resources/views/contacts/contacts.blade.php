<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Contact Form') }}
        </h2>
    </x-slot>



    <div class="pt-12 md:px-10 px-4 ">
        <div class=" mx-auto ">
            @if ($contacts->count() > 0)
                <div class="bg-white h-[78vh]   lg:overflow-hidden shadow-sm ">
                    <div x-data='{id:null, messages:{{ $contacts }}}' class=" text-gray-900 flex">
                        <div id="parentEmails" class="lg:w-1/3  w-full h-[91vh] border-t">
                            <div class="w-full h-[10%] bg-white border-b  flex justify-between items-center ps-6 pe-2">
                                <h1 class="text-xl text-[#252e32] font-bold">Inbox</h1>
                                <form action="{{ route('contact.export') }}" method="post">
                                    @csrf
                                    <button class="bg-black text-white px-4 py-1.5 rounded">
                                        Export Excel
                                    </button>
                                </form>
                            </div>
                            <div id="messagesColumn" class=" ">
                                @if ($contacts->count() < 1)
                                    <h1 class="text-center py-4">There is no messages</h1>
                                @endif
                                <div class="p-2 ps-4 border-b sticky">
                                    <p class="text-sm font-bold">{{ $contacts->count() }} Converstation,
                                        {{ $unreadMessages }} Unread</p>
                                </div>
                                <div class="md:h-[466px]  overflow-y-auto">
                                    @foreach ($contacts->reverse() as $key => $message)
                                        <div onclick="toggleHidden()" x-on:click='id = {{ $key }}'
                                            class="p-4  {{ $message->mark_as_read ? '' : 'bg-blue-100 border-b-2 hover:bg-blue-50' }} flex flex-col gap-y-2  text--700 w-full border-b hover:bg-gray-100 cursor-pointer">
                                            <div class="flex items-center  gap-x-2 text-lg font-medium">
                                                <h1 class="text-[#13181a] font-bold">
                                                    {{ Str::limit($message->full_name, 15, '...') }}</h1>
                                                <h5 class="font-medium text-sm text-[#999b9c]">{{ $message->email }}
                                                </h5>
                                            </div>
                                            <div class=" flex justify-between">
                                                <div class="flex items-center gap-x-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#3d5563" class="bi bi-box-arrow-up-right"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                                                        <path fill-rule="evenodd"
                                                            d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                                                    </svg>

                                                    <p class="font-[600] text-sm text-[#3d5563]">
                                                        {{ Str::limit($message->message, 50, '...') }}</p>
                                                </div>

                                                <p class="text-[#999b9c]">
                                                    {{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                        <template x-if="id !== null">
                        <div  class="lg:w-2/3 w-full max-h-[78vh]  overflow-y-hidden  border hidden lg:block">
                                <div class=" hidden w-full sm:flex flex-col gap-3 h-full px-4">
                                    <div
                                        class=" px-6 pt-1 w-full h-[10%] flex justify-between items-center bg-white border-b">
                                            <h1 x-text='messages[id].full_name'
                                                class="text-xl text-[#13181a] w-fit font-bold"></h1>
                                            
                                        <div class=" flex gap-3 justify-end items-center font-medium  ">
                                            <form :action="'{{ route('email.markread', '') }}' + '/' + messages[id].id"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <template x-if='messages[id].mark_as_read == false'>
                                                    <button class="flex items-center gap-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                            height="30" fill="currentColor" class="bi bi-toggle-off"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 4a4 4 0 0 1 0 8H8a5 5 0 0 0 2-4 5 5 0 0 0-2-4zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8M0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5" />
                                                        </svg>
                                                        <span>Mark as read </span>
                                                    </button>
                                                </template>
                                                <template x-if='messages[id].mark_as_read == true'>
                                                    <button class="flex items-center gap-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                            height="30" fill="" class="bi bi-toggle-on fill-alpha"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8" />
                                                        </svg>
                                                        <span>Mark as unread</span>
                                                    </button>
                                                </template>
                                            </form>
                                            <form :action="'{{ route('email.destroy', '') }}' + '/' + messages[id].id"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="flex gap-x-2 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="red" class="bi bi-trash"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg>
                                                    {{-- <span>Delete</span> --}}
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="p-6 h-[85%] border flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between  border-b pb-2  ">
                                                <div class="flex items-center gap-x-2">
                                                    <span class="text-[#999b9c] font-medium">From:</span>
                                                    <p x-text='messages[id].email' class="font-medium text-[#13181a] ">
                                                    </p>
                                                </div>
                                                <p class="text-[#999b9c] font-[500]"
                                                    x-text="new Date(messages[id].created_at).toLocaleString('en-US', { month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false })">
                                                </p>
                                            </div>
                                            <p class="pt-4 overflow-y-auto max-h-[48vh]" x-text='messages[id].message'></p>

                                        </div>
                                        <div class="flex w-full justify-end mt-3  px-6">
                                            <a class="bg-black px-3 py-2 text-white font-bold hover:bg-alpha hover:text-black rounded-lg"
                                                :href="'mailto:' + messages[id]?.email">Reply via email</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </template>
                        <template x-if='id === null'>
                            <div class="w-2/3 h-[91vh]  hidden lg:block  border">
                            <div class="hidden lg:flex w-full h-full justify-center gap-x-1 items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z" />
                                </svg>
                                <p class="">Select a message to view its contents</p>
                            </div>
                            </div>
                        </template>



                        
                        <template x-if="id !== null">

                            <div id="parentMessage"
                                class="p-2 w-full h-screen overflow-y-scroll fixed top-0 bg-white sm:hidden flex flex-col gap-3">
                                <div class="">
                                    <svg onclick="toggleHidden()" xmlns="http://www.w3.org/2000/svg" width="25"
                                        height="25" fill="currentColor" class="bi bi-arrow-left"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                    </svg>
                                </div>
                                <div  class=" w-full h-[91vh] border ">
                                    <div class=" w-full flex flex-col gap-3 h-full px-4">
                                        <div
                                            class=" pt-1 w-full h-[10%] flex justify-between items-center bg-white border-b">
                                            <div>
                                                <h1 x-text='messages[id].full_name'
                                                    class="text-xl text-[#13181a] font-bold"></h1>
                                                <p x-text='messages[id].email' class="font-medium text-md text-[#999b9c]">
                                                </p>
                                            </div>
                                            <div class=" flex gap-3 justify-end items-center font-medium  w-full">
                                                <form :action="'{{ route('email.markread', '') }}' + '/' + messages[id].id"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
    
                                                    <template x-if='messages[id].mark_as_read == false'>
                                                        <button class="flex items-center gap-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                height="30" fill="currentColor" class="bi bi-toggle-off"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 4a4 4 0 0 1 0 8H8a5 5 0 0 0 2-4 5 5 0 0 0-2-4zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8M0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5" />
                                                            </svg>
                                                            <span>Mark as read </span>
                                                        </button>
                                                    </template>
                                                    <template x-if='messages[id].mark_as_read == true'>
                                                        <button class="flex items-center gap-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                height="30" fill="" class="bi bi-toggle-on fill-alpha"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8" />
                                                            </svg>
                                                            <span>Mark as unread</span>
                                                        </button>
                                                    </template>
                                                </form>
                                                <form :action="'{{ route('email.destroy', '') }}' + '/' + messages[id].id"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex gap-x-2 items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="red" class="bi bi-trash"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                            <path
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                        </svg>
                                                        
                                                    </button>
                                                </form>
                                            </div>
    
                                        </div>
                                        <div class="p-6    h-[85%] border flex flex-col justify-between">
                                            <div>
                                                <div class="flex justify-between  border-b pb-2  ">
                                                    <div class="flex items-center gap-x-2">
                                                        <span class="text-[#999b9c] font-medium">From:</span>
                                                        <p x-text='messages[id].email' class="font-medium text-[#13181a] ">
                                                        </p>
                                                    </div>
                                                    <p class="text-[#999b9c] font-[500]"
                                                        x-text="new Date(messages[id].created_at).toLocaleString('en-US', { month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false })">
                                                    </p>
                                                </div>
                                                <p class="pt-4" x-text='messages[id].message'></p>
    
                                            </div>
                                            <div class="flex w-full justify-end  px-6">
                                                <a class="bg-black px-3 py-2 text-white font-bold hover:bg-alpha hover:text-black rounded-lg"
                                                    :href="'mailto:' + messages[id]?.email">Reply via email</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                                {{-- <div class="flex gap-3 justify-between items-center font-medium pb-3 w-full">
                                    <form :action="'{{ route('email.markread', '') }}' + '/' + messages[id].id"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <template x-if='messages[id].mark_as_read == false'>
                                            <button class="bg-white px-3 py-2 border-2 border-black rounded">
                                                Mark as read
                                            </button>
                                        </template>
                                        <template x-if='messages[id].mark_as_read == true'>
                                            <button class="bg-white px-3 py-2 border-2 border-black rounded">
                                                Mark as unread
                                            </button>
                                        </template>
                                    </form>
                                    <form :action="'{{ route('email.destroy', '') }}' + '/' + messages[id].id"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 text-white px-3 py-2 border-2 border-red-500 rounded">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                                <h1 x-text='messages[id].fullname' class="text-xl font-bold"></h1>
                                <p x-text="new Date(messages[id].created_at).toLocaleDateString('en-GB')"></p>
                                <p x-text='messages[id].email' class="font-medium text-lg"></p>
                                <p x-text='messages[id].message'></p> --}}
                            </div>
                        </template>
                    </div>


                </div>
                <!-- Mobile Card View -->
                {{-- <div class="md:hidden space-y-4 px-2">
                    @foreach ($contacts->reverse() as $contact)
                        <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="font-medium text-gray-900">{{ $contact->full_name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $contact->created_at->format('d-M-y') }}
                                    </p>
                                </div>
                                <button onclick="openModal('contactMessage{{ $contact->id }}')"
                                    class="bg-black py-2 px-3 rounded-lg text-alpha text-sm">
                                    Read Message
                                </button>
                            </div>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    <span class="text-gray-600">{{ $contact->phone }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    <span class="text-gray-600">{{ $contact->email }}</span>
                                </div>
                            </div>
                            @include('contacts.partials.contact_message_details')
                        </div>
                    @endforeach
                </div> --}}
        </div>
        {{-- <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">

                    <form class="flex justify-end md:px-10 px-4 py-5" action="{{ route('contact.export') }}"
                        method="post">
                        @csrf
                        <button class="bg-black text-white px-4 py-2 rounded">
                            Export Excel
                        </button>
                    </form>
                    <div class="p-6 text-gray-900 hidden md:flex">

                        <table class="w-full">
                            <thead>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                            </thead>

                            <tbody class="w-full">
                                @foreach ($contacts->reverse() as $contact)
                                    <tr class="w-full text-center h-[10vh] py-2">

                                        <td>
                                            {{ $contact->created_at->format('d-M-y') }}
                                        </td>
                                        <td>
                                            {{ $contact->full_name }}
                                        </td>
                                        <td>
                                            {{ $contact->phone }}
                                        </td>
                                        <td>
                                            {{ $contact->email }}
                                        </td>
                                        <td class="">
                                            <button onclick="openModal('contactMessage{{ $contact->id }}')"
                                                class="bg-black py-2 px-3 rounded-lg text-alpha">
                                                Read Message
                                            </button>
                                            @include('contacts.partials.contact_message_details')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- Mobile Card View -->
                    <div class="md:hidden space-y-4 px-2">
                        @foreach ($contacts->reverse() as $contact)
                            <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="font-medium text-gray-900">{{ $contact->full_name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $contact->created_at->format('d-M-y') }}</p>
                                    </div>
                                    <button onclick="openModal('contactMessage{{ $contact->id }}')"
                                        class="bg-black py-2 px-3 rounded-lg text-alpha text-sm">
                                        Read Message
                                    </button>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        <span class="text-gray-600">{{ $contact->phone }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                        <span class="text-gray-600">{{ $contact->email }}</span>
                                    </div>
                                </div>
                                @include('contacts.partials.contact_message_details')
                            </div>
                        @endforeach
                    </div>
                </div> --}}
    @else
        <div class="h-[91vh] border-t bg-white rounded-lg flex items-center justify-center w-full">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Messages Received</h1>
                <p class="text-gray-500 mb-6">It seems there are no messages in your inbox yet.</p>
                <p class="text-gray-400">Encourage visitors to reach out by checking that your contact form is
                    accessible and easy to use.</p>
            </div>
        </div>

        @endif
    </div>
    </div>
    <script>
        function toggleHidden(){
            
            if (parentMessage.classList.contains("hidden")) {
                parentMessage.classList.remove("hidden")
                // parentEmails.classList.add("hidden")
                
            }else{
                parentMessage.classList.add("hidden")  
                // parentEmails.classList.remove('hidden')
                
            }

        }
    </script>
</x-app-layout>
