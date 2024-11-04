<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Newsletter') }}
        </h2>

        {{-- <a href="{{ route('events.create') }}">
            <button
                class=" py-[0.7rem] px-[2rem] text-[16px] font-bold rounded-[10px] bg-alpha hover:bg-black hover:text-white transition
            duration-150 ">Create
                Event
            </button>
        </a> --}}
    </x-slot>
    <div class="flex gap-2 p-4 rounded-lg">
        <form class="md:w-1/2 bg-white p-3 flex flex-col gap-3" action="{{ route('newsletter.store') }}" method="POST">
            @csrf
            <div>
                <h1 class="text-xl font-bold">Send Newsletter</h1>
                <p>Compose and send a newsletter to all subscribers</p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-bold" for="">Subject</label>
                <input name="subject" class="rounded-sm" type="text" placeholder="Newsletter subject">
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-bold" for="">Content</label>
                <textarea name="content" class="rounded-sm" id="" cols="30" rows="10"
                    placeholder="Write your newsletter content here ..."></textarea>
            </div>
            <button class="bg-black text-white flex justify-center items-center px-3 py-2 rounded-sm">Send
                Newsletter</button>
        </form>
        <div class="md:w-1/2  flex flex-col gap-3 ">
            <div class="text-xl bg-white p-4 flex flex-col gap-4">
                <h1 class="font-bold">Total Subscribers</h1>
                <p class="font-medium">5678</p>
            </div>
            <div class="bg-white p-4">
                <div>
                    <h1 class="text-xl font-bold">Newsletter History</h1>
                    <p>Recent newsletters sent to subscribers</p>
                </div>
                <div>
                    <table class="w-full ">
                        <tr class="border-b ">
                            <th class="py-3 text-start">Subject</th>
                            <th class="py-3 text-start">Sent Date</th>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3">New chapter is start</td>
                            <td class="py-3">2023-06-15</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3">New chapter is start</td>
                            <td class="py-3">2023-06-15</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3">New chapter is start</td>
                            <td class="py-3">2023-06-15</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3">New chapter is start</td>
                            <td class="py-3">2023-06-15</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
