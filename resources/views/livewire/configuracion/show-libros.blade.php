<div>
    <x-contenedor>
        <div
            class="px-6 py-4 grid grid-cols-3 gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Libros
                </h2>
                <p class="text-sm text-gray-600">
                    Agregar libros, editar y más.
                </p>
            </div>
            <div>
                <x-input type="text" wire:model.live="search" />
            </div>
            <div>
                <div class="inline-flex gap-x-2">
                    <x-my-button class="bg-gray-800" wire:click="$set('openCreate', true)">
                        <i class="fa-duotone fa-id-card"></i> Agregar
                    </x-my-button>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <!-- Table -->
        @if ($libros->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                            wire:click="order('cota')">
                            <div class="flex items-center gap-x-2 justify-between">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Cota
                                </span>
                                <div class="text-xs font-semibold">
                                    @if ($sort == 'cota')
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
                        {{-- <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 pl-4 py-3 text-start" role="button"
                            wire:click="order('titulo')">
                            <div class="flex items-center gap-x-2 justify-between">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Libro
                                </span>
                                <div class="text-xs font-semibold">
                                    @if ($sort == 'titulo')
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
                        </th> --}}
                        <th scope="col" class="" role="button"
                            wire:click="order('titulo')">
                            <div class="flex items-center gap-x-2 justify-between">
                                <span class="text-xs font-semibold uppercase pl-4 tracking-wide text-gray-800">
                                    Ubicacion
                                </span>
                                <div class="text-xs font-semibold">
                                    @if ($sort == 'titulo')
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
                    @foreach ($libros as $libro)
                        <tr>
                            <td class="h-px w-4 whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="block text-sm text-gray-500">{{ $libro->cota }}</span>
                                </div>
                            </td>
                            <td class="h-px w-72 whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="block text-sm font-semibold text-gray-500">{{ $libro->titulo }}</span>
                                    <span class="block text-sm text-gray-500"><span class="fomt-semibold">Autor: </span> {{ $libro->autor }}</span>
                                </div>
                            </td>
                            {{-- <td class="whitespace-nowrap">
                                <div class="grow">
                                    <span class="block text-sm font-semibold text-gray-500">{{ $libro->subcategoria->nombre }}</span>
                                    <span class="block text-sm text-gray-500">{{ $libro->carrera->nombre }}</span>
                                </div>

                            </td> --}}
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="text-sm text-gray-500">{{ $libro->created_at->toFormattedDateString() }}</span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="flex">

                                    <a wire:click="edit({{ $libro->id }})" class="cursor-pointer bg-gray-100 items-center py-2 px-2 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 mr-2">
                                        <i class="fa-duotone fa-pen-to-square"></i>
                                    </a>
                                    <a wire:click="confirmDeleteLibro({{ $libro->id }})" class=" items-center py-2 px-2 bg-gray-100 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 cursor-pointer">
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
                    {{ $libros->links('vendor.livewire.simple-tailwind') }}

                </span>
            </div>
        @else
            <div class="px-6 py-4 text-center text-sm text-gray-500">
                 No existe ninguna coincidencia con tu busqueda: <span class="font-bold">{{ $search }}</span>
            </div>
        @endif
    </x-contenedor>

    <form autocomplete="off" wire:submit="save">
        <x-dialog-modal wire:model="openCreate">
            <x-slot name="title">
                Registrar nuevo libro
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-12 grid-rows-6 gap-1">
                    <div class="col-span-6">
                        <x-label for="titulo" class="text-sm" value="{{ __('Titulo') }}" />
                        <x-input id="titulo" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="titulo" />
                        <x-input-error for="titulo" class="mt-1" />
                    </div>

                    <div class="col-span-6">
                        <x-label for="editorial" class="text-sm" value="{{ __('Editorial') }}" />
                        <x-input id="editorial" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="editorial" />
                        <x-input-error for="editorial" class="mt-1" />
                    </div>

                    <div class="row-start-2 col-span-4">
                        <x-label for="edicion" class="text-sm" value="{{ __('Edición') }}" />
                        <x-input id="edicion" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="edicion" />
                        <x-input-error for="edicion" class="mt-1" />
                    </div>

                    <div class=" col-span-4">
                        <x-label for="autor" class="text-sm" value="{{ __('Autor') }}" />
                        <x-input id="autor" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="autor" />
                        <x-input-error for="autor" class="mt-1" />
                    </div>
                    <div class=" col-span-4">
                        <x-label for="condicion" class="text-sm" value="{{ __('Condicion') }}" />
                        <x-input id="condicion" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="condicion" />
                        <x-input-error for="condicion" class="mt-1" />
                    </div>

                    <div class="row-star-3 col-span-6">
                        <x-label for="serial" class="text-sm" value="{{ __('Serial') }}" />
                        <x-input id="serial" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="serial" />
                        <x-input-error for="serial" class="mt-1" />
                    </div>

                    <div class="col-span-6">
                        <x-label for="cota_universal" class="text-sm" value="{{ __('Cota Universal') }}" />
                        <x-input id="cota_universal" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="cota_universal" />
                        <x-input-error for="cota_universal" class="mt-1" />
                    </div>

                    <div class="row-star-4 col-span-4">
                        <x-label for="nro_ejemplares" class="text-sm" value="{{ __('Nro. Ejemplares') }}" />
                        <x-input id="nro_ejemplares" type="number" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="nro_ejemplares" />
                        <x-input-error for="nro_ejemplares" class="mt-1" />
                    </div>

                    <div class="col-span-4">
                        <x-label for="procedencia" class="text-sm" value="{{ __('Procedencia') }}" />

                        <x-select id="procedencia" class="!py-1.8 !px-1.5 mt-1 block w-full"
                                wire:model.live="procedencia">
                            <option>Seleccione una opción</option>
                            <option value="1">DONACIÓN</option>
                            <option value="2">ADJUDICACIÓN</option>
                            <option value="3">ADQUISICIÓN</option>
                            <option value="4">HERENCIA</option>
                            <option value="5">INTERCAMBIO</option>
                        </x-select>
                        <x-input-error for="procedencia" class="mt-1" />
                    </div>

                    <div class="col-span-4">
                        <x-label for="estatus" class="text-sm" value="{{ __('Estatus') }}" />
                        <x-input id="estatus" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="estatus" />
                        <x-input-error for="estatus" class="mt-1" />
                    </div>
                    <div class="row-star-6 col-span-4">
                        <x-label for="categoria_id" class="text-sm" value="{{ __('Categoria') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="categoria_id">
                                <option>Seleccione una opción</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="type_user_id" class="mt-2" />
                    </div>
                    <div class="col-span-4">
                        <x-label for="subcategoria_id" class="text-sm" value="{{ __('Subcategoria') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="subcategoria_id">
                                <option>Seleccione una opción</option>
                                @foreach ($subcategorias as $subcategoria)
                                    <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="type_user_id" class="mt-2" />
                    </div>
                    <div class="col-span-4">
                        <x-label for="carrera_id" class="text-sm" value="{{ __('PNF') }}" />
                        <div class="space-y-2">
                            <x-select class="!py-2 !px-1.5 mt-1" wire:model.live="carrera_id">
                                <option>Seleccione una opción</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="type_user_id" class="mt-2" />
                    </div>

                    <div class="row-star-6 col-span-12">
                        <x-label for="observacion" class="text-sm" value="{{ __('Observación') }}" />
                        <x-textarea id="observacion" type="text" class="!py-1 !px-1.5 mt-1 block w-full" wire:model.live="observacion" />
                        <x-input-error for="observacion" class="mt-1" />
                    </div>
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-secondary-button class="mr-4" wire:click="$set('openCreate', false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button type="submit" class="disabled:opacity-25">
                    Guardar
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>

    <form autocomplete="off" wire:submit.prevent="update">
        <x-dialog-modal wire:model="openEdit">
            <x-slot name="title">
                Editar Libro
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-12 grid-rows-6 gap-1">

                    <!-- Título -->
                    <div class="col-span-6">
                        <x-label for="titulo" class="text-sm" value="{{ __('Título') }}" />
                        <x-input id="titulo" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="titulo" />
                        <x-input-error for="titulo" class="mt-1" />
                    </div>

                    <!-- Editorial -->
                    <div class="col-span-6">
                        <x-label for="editorial" class="text-sm" value="{{ __('Editorial') }}" />
                        <x-input id="editorial" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="editorial" />
                        <x-input-error for="editorial" class="mt-1" />
                    </div>

                    <!-- Edición -->
                    <div class="row-start-2 col-span-4">
                        <x-label for="edicion" class="text-sm" value="{{ __('Edición') }}" />
                        <x-input id="edicion" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="edicion" />
                        <x-input-error for="edicion" class="mt-1" />
                    </div>

                    <!-- Autor -->
                    <div class=" col-span-4">
                        <x-label for="autor" class="text-sm" value="{{ __('Autor') }}" />
                        <x-input id="autor" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="autor" />
                        <x-input-error for="autor" class="mt-1" />
                    </div>

                    <!-- Condición -->
                    <div class=" col-span-4">
                        <x-label for="condicion" class="text-sm" value="{{ __('Condición') }}" />
                        <x-input id="condicion" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="condicion" />
                        <x-input-error for="condicion" class="mt-1" />
                    </div>

                    <!-- Serial -->
                    <div class="row-star-3 col-span-4">
                        <x-label for="serial" class="text-sm" value="{{ __('Serial') }}" />
                        <x-input id="serial" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="serial" />
                        <x-input-error for="serial" class="mt-1" />
                    </div>

                    <!-- Cota -->
                    <div class=" col-span-4">
                        <x-label for="cota" class="text-sm" value="{{ __('Cota') }}" />
                        <x-input id="cota" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="cota" />
                        <x-input-error for="cota" class="mt-1" />
                    </div>

                    <!-- Cota Universal -->
                    <div class=" col-span-4">
                        <x-label for="cota_universal" class="text-sm" value="{{ __('Cota Universal') }}" />
                        <x-input id="cota_universal" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="cota_universal" />
                        <x-input-error for="cota_universal" class="mt-1" />
                    </div>

                    <!-- Número de Ejemplares -->
                    <div class="row-star-4 col-span-4">
                        <x-label for="nro_ejemplares" class="text-sm" value="{{ __('Número de Ejemplares') }}" />
                        <x-input id="nro_ejemplares" type="number" min="1" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="nro_ejemplares" />
                        <x-input-error for="nro_ejemplares" class="mt-1" />
                    </div>

                    <!-- Procedencia -->
                    <div class=" col-span-4">
                        <x-label for="procedencia" class="text-sm" value="{{ __('Procedencia') }}" />
                        <x-select id="procedencia" class="!py-1 !px-1.5 mt-1 block w-full"
                                wire:model.live="procedencia">
                            <option disabled>Seleccione una subcategoría</option>
                            <option value="1">DONACIÓN</option>
                            <option value="2">ADJUDICACIÓN</option>
                            <option value="3">ADQUISICIÓN</option>
                            <option value="4">HERENCIA</option>
                            <option value="5">INTERCAMBIO</option>
                        </x-select>
                        <x-input-error for="procedencia" class="mt-1" />
                    </div>

                    <!-- Estatus -->
                    <div class=" col-span-4">
                        <x-label for="estatus" class="text-sm" value="{{ __('Estatus') }}" />
                        <x-input id="estatus" type="text" class="!py-1 !px-1.5 mt-1 block w-full"
                                 wire:model.live="estatus" />
                        <x-input-error for="estatus" class="mt-1" />
                    </div>
                    <div class="row-star-5 col-span-4">
                        <x-label for="categoria_id" class="text-sm" value="{{ __('Categoría') }}" />
                        <x-select id="categoria_id" class="!py-1 !px-1.5 mt-1 block w-full"
                                  wire:model="categoria_id">
                            <option>Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="categoria_id" class="mt-1" />
                    </div>

                    <!-- Subcategoría -->
                    <div class="col-span-4">
                        <x-label for="subcategoria_id" class="text-sm" value="{{ __('Subcategoría') }}" />
                        <x-select id="subcategoria_id" class="!py-1 !px-1.5 mt-1 block w-full"
                                  wire:model="subcategoria_id">
                            <option>Seleccione una subcategoría</option>
                            @foreach($subcategorias as $subcategoria)
                                <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="subcategoria_id" class="mt-1" />
                    </div>

                    <!-- Carrera -->
                    <div class=" col-span-4">
                        <x-label for="carrera_id" class="text-sm" value="{{ __('Carrera') }}" />
                        <x-select id="carrera_id" class="!py-1 !px-1.5 mt-1 block w-full"
                                wire:model.live="carrera_id">
                            <option>Seleccione una carrera</option>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="carrera_id" class="mt-1" />
                    </div>

                    <!-- Observación -->
                    <div class="row-start-6 col-span-12">
                        <x-label for="observacion" class="text-sm" value="{{ __('Observación') }}" />
                        <x-textarea id="observacion" class="!py-1 !px-1.5 mt-1 block w-full"
                                  wire:model.live="observacion"></x-textarea>
                        <x-input-error for="observacion" class="mt-1" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="mr-4" wire:click="$set('openEdit', false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button type="submit" class="disabled:opacity-25">
                    Guardar
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>


    <x-dialog-modal wire:model="confirmLibroDeletion">
        <x-slot name="title">
            {{ __('Eliminar Libro') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Estás seguro de que deseas eliminar este libro? Por favor ingrese su contraseña para confirmar.') }}

            <div class="mt-4" x-data="{}"
                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                    x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteLibro" />

                <x-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmLibroDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteLibro" wire:loading.attr="disabled">
                {{ __('Eliminar Libro') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
