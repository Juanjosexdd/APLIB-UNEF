<div>
    <x-contenedor>

        <div
            class="px-6 py-4 grid grid-cols-3 gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Solicitudes
                </h2>
                <p class="text-sm text-gray-600">
                    Todas las solicitudes.
                </p>
            </div>
            <div>
                <x-input type="text" wire:model.live="search" />
            </div>
            {{-- <div>
                <div class="inline-flex gap-x-2">
                    <a class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-normal text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                        href="{{ route('mi-solicitud-libros.index') }}">
                        <i class="fa-duotone fa-id-card"></i> Agregar
                    </a>
                </div>
            </div> --}}
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start">#</th>
                    <th class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start">Usuario</th>
                    <th class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start">Fecha de Solicitud</th>
                    <th class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start">Fecha de Devolución</th>
                    <th class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start">Estatus</th>
                    {{-- <th class="px-4 py-3 border-b text-center">Acciones</th> --}}
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($solicitudes as $solicitud)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <span class="block text-sm text-gray-500">
                                SOL-{{ $solicitud->id }}
                            </span>

                        </td>
                        <td class="px-4 py-3">
                            <span class="block text-sm text-gray-500">

                                {{ $solicitud->user->name }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <span class="block text-sm text-gray-500">

                                {{ \Carbon\Carbon::parse($solicitud->fecha_prestamo)->format('d/m/Y') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="block text-sm text-gray-500">

                                {{ \Carbon\Carbon::parse($solicitud->fecha_devolucion)->format('d/m/Y') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <!-- Menú desplegable para cambiar el estatus -->
                            <x-select wire:change="actualizarEstatus({{ $solicitud->id }}, $event.target.value)"
                                class="px-2 py-1 border border-gray-300 rounded-lg">
                                <option value="Pendiente" {{ $solicitud->estatus == 'Pendiente' ? 'selected' : '' }}>
                                    Pendiente</option>
                                <option value="Aprobado" {{ $solicitud->estatus == 'Aprobado' ? 'selected' : '' }}>
                                    Aprobado</option>
                                <option value="Rechazado" {{ $solicitud->estatus == 'Rechazado' ? 'selected' : '' }}>
                                    Rechazado</option>
                            </x-select>
                        </td>
                        {{-- <td class="px-4 py-3 text-center">
                            <button
                                class="px-4 py-2 bg-blue-500 text-white text-xs font-semibold rounded-lg hover:bg-blue-600">
                                Ver Detalles
                            </button>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $solicitudes->links('pagination::tailwind') }}
        </div>

        @if (session()->has('message'))
            <div class="mt-4 bg-green-100 text-green-800 p-2 rounded">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="mt-4 bg-red-100 text-red-800 p-2 rounded">
                {{ session('error') }}
            </div>
        @endif

    </x-contenedor>

</div>
