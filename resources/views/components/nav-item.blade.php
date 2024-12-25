@props(['route', 'icon', 'label', 'active' => false])

<a x-data="{
    active: {{ $active ? 'true' : 'false' }}
}" href="{{ route($route) }}"
    :class="{
        'bg-gray-300': active && !darkmode,
        'text-alpha bg-gray-800': active && darkmode,
        'hover:bg-gray-800 hover:text-alpha': darkmode && !active,
        'hover:bg-gray-300': !darkmode && !active
    }"
    class="nav-button no-underline text-base font-bold py-[0.75rem]  flex items-center gap-2  rounded-xl px-[1rem]
    ">
    <x-nav-icon :name="$icon" />
    <p class="hidden group-hover:block truncate">{{ $label }}</p>
</a>
