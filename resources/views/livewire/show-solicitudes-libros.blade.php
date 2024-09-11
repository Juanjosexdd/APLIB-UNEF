<div>
    <x-contenedor>
        <div
            class="px-6 py-4 grid grid-cols-3 gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Mis Solicitudes
                </h2>
                <p class="text-sm text-gray-600">
                    Todas mis solicitudes.
                </p>
            </div>
            <div>
                <x-input type="text" wire:model.live="search" />
            </div>
            <div>
                <div class="inline-flex gap-x-2">
                    <a class="bg-gray-800" href="{{route('mi-solicitud-libros.index')}}">
                        <i class="fa-duotone fa-id-card"></i> Agregar
                    </a>
                </div>
            </div>
        </div>
        <!-- End Header -->
        @if ($missolicitudes->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                            wire:click="order('nombre')">
                            <div class="flex items-center gap-x-2 justify-between">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Nombre
                                </span>
                                <div class="text-xs font-semibold">
                                    @if ($sort == 'nombre')
                                        @if ($direction == 'asc')
                                            <i class="fa-duotone fa-arrow-up-a-z"></i>
                                        @else
                                            <i class="fa-duotone fa-arrow-down-z-a"></i>
                                        @endif
                                    @else
                                        <i class="fa-duotone fa-sort-up"></i>
                                    @endif
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                            wire:click="order('descripcion')">
                            <div class="flex items-center gap-x-2 justify-between">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Descripción
                                </span>
                                <div class="text-xs font-semibold">
                                    @if ($sort == 'descripcion')
                                        @if ($direction == 'asc')
                                            <i class="fa-duotone fa-arrow-up-a-z"></i>
                                        @else
                                            <i class="fa-duotone fa-arrow-down-z-a"></i>
                                        @endif
                                    @else
                                        <i class="fa-duotone fa-sort-up"></i>
                                    @endif
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                            wire:click="order('estatus')">
                            <div class="flex items-center gap-x-2 justify-between">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Estatus
                                </span>
                                <div class="text-xs font-semibold">
                                    @if ($sort == 'estatus')
                                        @if ($direction == 'asc')
                                            <i class="fa-duotone fa-arrow-up-a-z"></i>
                                        @else
                                            <i class="fa-duotone fa-arrow-down-z-a"></i>
                                        @endif
                                    @else
                                        <i class="fa-duotone fa-sort-up"></i>
                                    @endif
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                    F. de Registro
                                </span>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-end"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($missolicitudes as $missolicitude)
                        <tr>
                            <td class="h-px w-72 whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="block text-sm text-gray-500"></span>
                                </div>
                            </td>
                            <td class="h-px w-72 whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="block text-sm text-gray-500"></span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="text-sm text-gray-500"></span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="flex">

                                    <a
                                        class="cursor-pointer bg-gray-100 items-center py-2 px-2 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 mr-2">
                                        <i class="fa-duotone fa-pen-to-square"></i>
                                    </a>
                                    <a
                                        class=" items-center py-2 px-2 bg-gray-100 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                        <i class="fa-duotone fa-trash-can-plus"></i>

                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-2 px-4 float-right">
                <span class="pagination">
                    {{ $missolicitudes->links('vendor.livewire.simple-tailwind') }}

                </span>
            </div>
        @else
            <div class="px-6 py-4 text-center text-sm text-gray-500">
                No existe ninguna coincidencia con tu busqueda: <span class="font-bold">{{ $search }}</span>
            </div>
        @endif
    </x-contenedor>
</div>
