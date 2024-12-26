<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <div class="pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white table overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 flex flex-col gap-y-3">
                    <div class="flex justify-end gap-x-2 items-center ">
                        @if ($coworking->status == '2')
                            <form method="POST" :action="`{{ route('coworkings.update', '') }}/${cow.id}`"
                                class="flex items-center justify-center gap-x-2 mt-2">
                                @csrf
                                @method('PUT')
                                <button class="bg-[#356966]  text-white px-2 h-12 rounded-lg mb-2 " type="submit"
                                    name="action" value="approve">
                                    Approve
                                </button>
                            </form>
                        @endif
                        <button onclick="openModal('modelConfirm')"
                            class="text-slate-800 hover:text-blue-600 text-sm bg-white h-12 hover:bg-slate-100 border border-red-900 rounded-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </span>
                            <span class="hidden md:inline-block text-red-900">Delete Request</span>

                        </button>
                        @include('coworkings.partials.delete_modal')

                    </div>
                    @php
                        $fields = [
                            'Full Name' => $coworking->full_name,
                            'Email' => $coworking->email,
                            'Phone' => $coworking->phone,
                            'Birthday' => $coworking->birthday,
                            'Formation' => $coworking->formation,
                            'cv' => $coworking->cv,
                            'Project Name' => $coworking->proj_name,
                            'Project Description' => $coworking->proj_description,
                            'Domain' => $coworking->domain,
                            'Plan' => $coworking->plan,
                            'presentation' => $coworking->presentation,
                            'Previous Projects' => $coworking->prev_proj,
                            'Reasons' => $coworking->reasons,
                            'Needs' => $coworking->needs,
                            'Status' =>
                                $coworking->status == 1
                                    ? 'Approved'
                                    : ($coworking->status == 2
                                        ? 'Rejected'
                                        : 'Pending'),
                        ];
                    @endphp
                    <div class=" max-h-[73vh] overflow-y-auto">
                        <table class="min-w-full mx-auto  border border-black shadow-md ">
                            <thead>
                                <tr class="bg-alpha ">
                                    <th class="border border-black p-3 w-[35vw]">Field</th>
                                    <th class="border border-black p-3">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fields as $label => $value)
                                    @php
                                        $bgClass = $loop->iteration % 2 == 0 ? 'bg-alpha/10' : '';
                                    @endphp

                                    <tr class="{{ $bgClass }}">
                                        <td class="border p-3 border-alpha font-semibold">{{ $label }}</td>
                                        <td class="border p-3 border-alpha">
                                            @if ($label == 'cv' || $label == 'presentation')
                                                @if ($value)

                                                    <div
                                                        class="flex gap-2 border items-center justify-center bg-black text-alpha p-2 rounded">
                                                        <a class="font-semibold"
                                                            href="{{ asset('storage/' . $coworking->$label) }}"
                                                            download="{{ $coworking->full_name . '_' . $label }}">
                                                            {{ $coworking->full_name . ' ' . $label }}
                                                        </a>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffc801"
                                                            class="size-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            @elseif ($label == 'Domain' || $label == 'Reasons')
                                                <span class="capitalize">
                                                    {{ str_replace('-', ' ', implode(', ', explode(',', $value))) }}
                                                </span>
                                            @else
                                                {!! $value !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
