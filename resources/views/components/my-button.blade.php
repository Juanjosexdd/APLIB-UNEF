<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm disabled:opacity-50 bg-gray-800 shadow-lg shadow-gray-500/50']) }}>
    {{ $slot }}
</button>
