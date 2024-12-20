@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-100 dark:text-gray-700 focus:border-gray-700 dark:focus:border-2 dark:focus:border-gray-700 focus:ring-0  dark:focus:ring-0 rounded-md shadow-sm']) }}>
