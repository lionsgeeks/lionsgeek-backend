@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-900 dark:text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
