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
                <p class="font-medium">{{ $subscribers->count() }}</p>
            </div>
            <div class="bg-white p-4">
                <div>
                    <h1 class="text-xl font-bold">Newsletter History</h1>
                    <p>Recent newsletters sent to subscribers</p>
                </div>
                <div>
                    @if ($lastnews->count() > 0)
                        <table class="w-full ">
                            @foreach ($lastnews as $item)
                                <tr class="border-b ">
                                    <th class="py-3 text-start">{{ $item->subject }}</th>
                                    <th class="py-3 text-start">{{ $item->created_at }}</th>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="flex flex-col items-center justify-center min-h-[40vh] text-black/50">
                            <h1 class="text-xl font-bold ">Not Available</h1>
                            <p>It looks like you haven't sent any newsletters yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
