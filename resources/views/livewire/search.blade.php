<div class="flex-1 relative">
    <form autocomplete="off">
        <x-input name="search" wire:model.live="search" type="text" class="w-full"
            placeholder="¿Estás buscando algún libro?" />

        <button class="absolute top-0 right-0 w-12 h-full bg-gray-200 flex items-center justify-center rounded-r-md">
            <x-search size="35" color="#4b5563" />
        </button>
    </form>

    @if ($open)
        <div class="absolute w-full z-50" @click.away="$wire.open = false">
            <div class="bg-white rounded-lg shadow mt-1">
                <div class="px-4 py-3 space-y-1">
                    @forelse ($libros as $libro)
                        <a href="" class="flex">
                            <img src="{{ $libro->profile_photo_url }}" class="rounded-full w-16 h-12 object-cover" alt="">
                            <div class="ml-4 text-gray-700">
                                <p class="text-lg font-semibold leading-5">{{ $libro->titulo }}</p>
                                <p class="text-sm"> Carrera: {{$libro->carrera->nombre}}</p>
                            </div>
                        </a>
                    @empty
                        <p class="text-lg leading-5">No se encontraron libros con ese título.</p>
                    @endforelse
                </div>
            </div>
        </div>
    @endif
</div>
