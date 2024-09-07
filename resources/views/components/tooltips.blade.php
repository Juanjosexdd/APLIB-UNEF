<div class="hs-tooltip inline-block">
    <button type="button"
        class="hs-tooltip-toggle inline-flex justify-center items-center rounded-full border border-gray-200 text-gray-600 hover:border-blue-200 hover:text-blue-600">
        <i class="fa-light fa-circle-question fa-2xs mt-2"></i>
        <span
            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
            role="tooltip">
            {{ $slot }}
        </span>
    </button>
</div>
