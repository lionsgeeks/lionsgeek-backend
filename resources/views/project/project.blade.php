<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight ">
            {{ __('Projects') }}
        </h2>
    </x-slot>


    <div class="pt-12">
        <div class="  mx-auto sm:px-10 lg:px-10 ">
            <div class="bg-white min-h-[76vh] mb-5 w-full shadow-sm sm:rounded-lg flex flex-row-reverse items-center gap-5 flex-wrap px-8 py-5">
                @if ($projects->count()>0)
                <button onclick="openModal('projectCreate')"
                    class="bg-black text-white rounded-lg px-4 py-2 hover:bg-alpha hover:text-black  transition duration-150 ">Add
                    Project
                </button>

                @endif
                @include('project.partials.create_project')
                <div class="w-full flex gap-5 flex-wrap ">
                    @forelse ($projects as $project)
                        <div class="w-[32%] shadow-l bg-[#fafafa] border border-gray-500/50 rounded-lg p-5 ">
                            <div class="py-2 flex items-center justify-between">
                                <div class=" flex items-center gap-x-3">
                                    <img class="w-14 h-14 rounded-full object-cover"
                                        src="{{ asset('storage/images/projects/' . $project->logo) }}" alt="">
                                    <h1 class="font-bold text-lg truncate">{{ $project->name }}</h1>
                                </div>
                                <div class="relative flex items-center gap-x-3">

                                    <button onclick="openModal('projectUpdate{{ $project->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mb-1.5"
                                            fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                        </svg>
                                    </button>
                                    @include('project.partials.edit_project')


                                        <button id="delete-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                            </svg>
                                        </button>

                                    <div id="confirmation-project"
                                    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                    <div class="bg-white rounded-lg shadow-lg p-6 w-[37vw] ">
                                        <h2 class="text-lg font-semibold text-gray-800">Are you sure?</h2>
                                        <p class="text-sm text-gray-600 mt-2">Do you really want to remove this project? This
                                            action cannot be undone.</p>
                                        <div class="flex justify-end space-x-4 mt-4">
                                            <button id="cancel-button"
                                                class="py-2 px-4 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
                                                <form class="" method="post" action="{{ route('projects.destroy', $project) }}">
                                                    @csrf @method('delete')
                                                <button id="confirm-button"
                                                    class="py-2 px-4 bg-red-600 text-white rounded-lg hover:bg-red-700">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.getElementById('delete-button').addEventListener('click', function() {
                                        document.getElementById('confirmation-project').classList.remove('hidden');
                                    });

                                    document.getElementById('cancel-button').addEventListener('click', function() {
                                        document.getElementById('confirmation-project').classList.add('hidden');
                                    });

                                    document.getElementById('confirm-button').addEventListener('click', function() {
                                        document.getElementById('delete-form').submit();
                                    });
                                </script>
                                </div>

                            </div>
                            <div class="py-3">
                                <img class=" w-full shadow-l h-[30vh] rounded-lg object-cover"
                                    src="{{ asset('storage/images/projects/' . ($project->preview ? $project->preview : $project->logo)) }}"
                                    alt="">

                            </div>

                            {{-- <p class="mb-0 truncate text-black/60 pt-2">{{ $project->description }}</p> --}}

                        </div>

                    @empty
                        <div class="h-[70vh] flex items-center justify-center w-full">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-gray-700 mb-3">No Projects Available</h1>
                                <p class="text-gray-500 mb-6">It looks like there aren’t any projects created yet.</p>
                                <button onclick="openModal('projectCreate')"
                                    class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black  transition">
                                    Create a New Project
                                </button>
                            </div>
                        </div>
                    @endforelse
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
