<div>
    <h2 class="text-lg font-semibold">Carrito de Solicitudes</h2>

    @if (count($libros) > 0)
        <ul>
            @foreach ($libros as $index => $libro)
                <li class="flex items-center justify-between p-2">
                    <div>
                        <span>{{ $libro->titulo }}</span>
                        <span class="text-sm text-gray-500">({{ $libro->autor }})</span>
                    </div>
                    <button wire:click="removerDelCarrito({{ $index }})" class="text-red-500">Eliminar</button>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay libros en el carrito.</p>
    @endif

    <button class="mt-4 px-4 py-2 bg-blue-500 text-white">Solicitar Libros</button>
</div>
