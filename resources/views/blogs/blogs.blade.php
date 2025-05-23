<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('BLOGS') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            @if ($blogs->count() > 0)
                <div :class="darkmode ? 'bg-dark text-white' : 'bg-white'"
                    class=" min-h-[76vh] mb-3 shadow-sm sm:rounded-lg">
                    <div class="flex justify-end px-5 py-3   ">
                        <a href="{{ route('blogs.create') }}">
                            <button
                                :class="darkmode ? 'bg-alpha text-black hover:opacity-75' :
                                    'bg-black text-white hover:bg-alpha hover:text-black'"
                                class=" rounded-lg px-4 py-2  font-bold transition duration-150">
                                <span class="text-lg font-bold">+</span> Write a New Blog
                            </button>
                        </a>
                    </div>
                    <div class="px-6 pb-6 ">
                        <div class="w-full flex justify-end">
                        </div>

                        <br><br>
                        {{-- All your blogs --}}
                        <div class="hidden md:flex">
                            <table class="w-full">
                                <thead class=" ">
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Creation Date</th>
                                    <th>Edit Blog</th>
                                    <th>Delete Blog</th>
                                </thead>

                                <tbody class="w-full">
                                    @foreach ($blogs->reverse() as $blog)
                                        <tr class="w-full text-center hover:opacity-75">
                                            <td class="flex py-2 items-center justify-center">
                                                <img class="w-32 h-20 border shadow object-cover"
                                                    src="{{ asset('storage/images/blog/' . $blog->image) }}"
                                                    alt="">
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

                                                <button class="text-red-600" id="delete-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>

                                            </td>
                                            <div id="confirmation-blog"
                                                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                                <div class="bg-white rounded-lg shadow-lg p-6 w-[37vw] ">
                                                    <h2 class="text-lg font-semibold text-gray-800">Are you sure?</h2>
                                                    <p class="text-sm text-gray-600 mt-2">Do you really want to remove
                                                        this blog? This
                                                        action cannot be undone.</p>
                                                    <div class="flex justify-end space-x-4 mt-4">
                                                        <button id="cancel-button"
                                                            class="py-2 px-4 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
                                                        <form action="{{ route('blogs.destroy', $blog) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="confirm-button"
                                                                class="py-2 px-4 bg-red-600 text-white rounded-lg hover:bg-red-700">Confirm</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                document.getElementById('delete-button').addEventListener('click', function() {
                                                    document.getElementById('confirmation-blog').classList.remove('hidden');
                                                });

                                                document.getElementById('cancel-button').addEventListener('click', function() {
                                                    document.getElementById('confirmation-blog').classList.add('hidden');
                                                });

                                                document.getElementById('confirm-button').addEventListener('click', function() {
                                                    document.getElementById('delete-form').submit();
                                                });
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Mobile  --}}
                        <div class="md:hidden space-y-4">
                            @foreach ($blogs->reverse() as $blog)
                                <div class="bg-white rounded-lg shadow-sm p-4">
                                    <div class="flex items-center space-x-4">
                                        <img class="w-24 h-16 border shadow object-cover rounded"
                                            src="{{ asset('storage/images/blog/' . $blog->image) }}" alt="">
                                        <div class="flex-1">
                                            <h3 class="font-medium t">{{ $blog->title->en }}</h3>
                                            <p class="text-sm text-gray-500">{{ $blog->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end space-x-3 mt-3 pt-3 border-t">
                                        <form action="{{ route('blogs.edit', $blog) }}" method="POST" class="inline">
                                            @csrf
                                            @method('GET')
                                            <button class="p-2 hover:bg-gray-100 rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-2 hover:bg-red-50 rounded-full text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="h-[70vh] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Blogs Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren't any blogs published yet.</p>
                        <a href="{{ route('blogs.create') }}">
                            <button
                                :class="darkmode ? 'bg-alpha text-black hover:opacity-75' :
                                    'bg-black text-white hover:bg-alpha hover:text-black'"
                                class=" rounded-lg px-4 py-2  font-bold transition duration-150">
                                <span class="text-lg font-bold">+</span> Write a New Blog
                            </button>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
