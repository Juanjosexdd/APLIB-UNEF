<select {!! $attributes->merge(['class' => 'block w-full rounded-md border text-gray-400 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 sm:text-sm sm:leading-6"']) !!}>
    {{ $slot }}
</select>
