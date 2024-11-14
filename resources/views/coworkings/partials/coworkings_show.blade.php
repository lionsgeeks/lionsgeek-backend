<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @php
                        $fields = [
                            'Full Name' => $coworking->full_name,
                            'Email' => $coworking->email,
                            'Phone' => $coworking->phone,
                            'Birthday' => $coworking->birthday,
                            'Formation' => $coworking->formation,
                            'CV' => $coworking->cv,
                            'Project Name' => $coworking->proj_name,
                            'Project Description' => $coworking->proj_description,
                            'Domain' => $coworking->domain,
                            'Plan' => $coworking->plan,
                            'Presentation' => $coworking->presentation,
                            'Previous Projects' => $coworking->prev_proj,
                            'Reasons' => $coworking->reasons,
                            'Needs' => $coworking->needs,
                        ];
                    @endphp

                    <table class="min-w-full mx-auto  border border-black shadow-md">
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
                                        @if ($label == 'CV' || $label == 'Presentation')
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
</x-app-layout>
