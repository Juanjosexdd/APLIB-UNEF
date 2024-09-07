@props(['active'])

@php
$classes = ($active ?? false)
            ? 'w-full pt-2 pb-2 pl-3 rounded-lg gap-3 inline-flex items-center px-1 pt-1 border-indigo-400 text-sm font-medium leading-5 text-white focus:outline-none focus:border-indigo-700 shadow-lg shadow-indigo-700 transition duration-150 ease-in-out bg-gray-800'
            : 'w-full pt-2 pb-2 pl-3 rounded-lg gap-3 inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700  transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
