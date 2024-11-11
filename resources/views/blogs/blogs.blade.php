<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('BLOGS') }}
        </h2>

        @if ($blogs->count() > 0)
            <a href="{{ route('blogs.create') }}">
                <button
                    class="bg-black text-white rounded-lg px-4 py-2 hover:bg-alpha hover:text-black  transition duration-150">
                    <span class="text-lg font-bold">+</span> Write a New Blog
                </button>
            </a>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($blogs->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <div class="w-full flex justify-end">

                        </div>

                        <br><br>
                        {{-- All your blogs --}}
                        <div>
                            <table class="w-full">
                                <thead>
                                    <th>image</th>
                                    <th>title</th>
                                    <th>creation date</th>
                                    <th>Edit Blog</th>
                                    <th>Delete Blog</th>
                                </thead>

                                <tbody class="w-full">
                                    @foreach ($blogs->reverse() as $blog)
                                        <tr class="w-full text-center ">
                                            <td class="flex py-2 items-center justify-center">
                                                <img class="w-32 h-20 border shadow object-cover"
                                                    src="{{ asset('storage/images/' . $blog->image) }}" alt="">
                                            </td>
                                            <td>
                                                {{ $blog->title->en }}
                                            </td>
                                            <td>
                                                {{ $blog->created_at }}
                                            </td>
                                            <td>
                                                <form action="{{ route('blogs.edit', $blog) }}" method="POST">
                                                    @csrf
                                                    @method('GET')
                                                    <button class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>

                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="h-[70vh] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Blogs Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any blogs published yet.</p>
                        <a href="{{ route('blogs.create') }}">
                            <button
                                class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                Write a New Blog
                            </button>
                        </a>
                    </div>
                </div>

            @endif
        </div>
    </div>
</x-app-layout>
