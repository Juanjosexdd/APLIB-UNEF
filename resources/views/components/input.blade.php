@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'py-2 px-3 !border-gray-300 rounded-lg wshph shadow-sm']) !!}>
