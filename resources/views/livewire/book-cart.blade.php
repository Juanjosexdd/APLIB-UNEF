@props(['libro'])


<section>
    <div class="lg:items-start group">
        <div class="mb-6 rounded-lg bg-white p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <img class="mr-2 h-10 w-10 rounded-full object-cover" src="" alt="profile" />
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">{{ $libro->autor }}</h3>
                        <span class="block text-xs font-normal text-gray-500">{{ $libro->editorial }}</span>
                    </div>
                </div>
                <p class="text-sm font-medium text-indigo-500 cursor-pointer" wire:click="addToCart({{ $libro->id }})">
                    <span class="mr-0.5">+</span>Solicitar
                </p>
            </div>
            <p class="my-4 text-sm font-normal text-gray-500">Libro: {{ $libro->titulo }}</p>
            <p class="text-sm font-normal text-gray-500">{{ $libro->observacion }}</p>
            <div class="mt-6 flex items-center justify-between text-sm font-semibold text-gray-900">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 h-5 w-5 text-base text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                    </svg>
                    <span class="mr-1">{{ $libro->nro_ejemplares }}</span> Disponibles
                </div>
            </div>
        </div>
</section>
