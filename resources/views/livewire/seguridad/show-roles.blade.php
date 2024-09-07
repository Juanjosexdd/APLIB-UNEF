<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-1 my-4 ml-4">
            <!-- About User -->
            <div
                class="overflow-hidden backdrop-blur transition-colors duration-500 supports-backdrop-blur:bg-white/60 dark:bg-transparent shadow-xl border border-zinc-300  border-dashed sm:rounded-lg mb-4 mt-4">

                <section class="container px-4 mx-auto">
                    <div class="flex flex-col mt-6">
                        <div class="flex justify-between p-2">
                            <div class="items-center">
                                <p class="uppercase text-slate-500 text-semibold text-sm mb-4 mr-4">
                                    Listado de roles
                                </p>
                            </div>
                            <x-input placeholder="Buscar" class="mb-4 w-1/4"  wire:model.live="search" />
                        </div>


                        <hr>
                        <div class=" overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                @if ($roles->count())
                                    <table class="text-gray-600">
                                        <thead class="border-b border-gray-300">
                                            <tr class="text-left">
                                                <th class="py-2 w-full">Nombre</th>
                                                <th class="py-2">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200  ">
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td class="py-2 text-sm">

                                                        {{ $role->name }}
                                                    </td>
                                                    <td class="py-2">
                                                        <div class="flex divide-x divide-gray-300 font-semibold">

                                                            <a class="pr-2 mr-2 hover:text-blue-600 cursor-pointer"
                                                                wire:click="edit({{ $role->id }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </a>
                                                            <a class="pl-4 hover:text-red-600 cursor-pointer"
                                                                wire:click="destroy({{ $role->id }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        {{-- {{ $permissions->links('vendor.livewire.simple-tailwind') }} --}}
                                    </div>
                                @else
                                    <div class="px-6 py-4 text-center text-sm">
                                        No existe ninguna coincidencia
                                    </div>
                                @endif
                            </div>

                        </div>

                    </div>
                </section>
            </div>
            <!--/ About User -->
        </div>
        <div class="md:col-span-2 m-4">
            <div
                class="overflow-auto rounded-lg p-4 sticky z-40 backdrop-blur transition-colors duration-500  border border-zinc-300 dark:border-zinc-300 border-dashed supports-backdrop-blur:bg-white/60 dark:bg-transparent shadow-xl mt-4">
                <div class="flex justify-between">
                    <div class="items-center">
                        <h4 class="uppercase text-slate-500 text-semibold mb-4 mr-4">
                            registro de roles
                        </h4>
                    </div>
                </div>

                <hr class="mb-4">

                <form autocomplete="off" wire:submit="save">
                    <div class=" grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6 mb-4">
                        <div class="sm:col-span-6">
                            <x-label for="createForm.name">Nombre del rol</x-label>
                            <div class="mt-2">
                                <x-input wire:model.live="createForm.name" />
                                <x-input-error for="createForm.name" />
                            </div>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach ($permissions as $permission)
                            <label for=""
                                class="flex p-2 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                <input wire:model.defer="createForm.permissions" type="checkbox" name="permissions[]"
                                    value="{{ $permission->id }}"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <span class="text-xs text-gray-500 ms-3">{{ $permission->description }}</span>
                            </label>
                        @endforeach
                    </div>

                    <x-button class="flex justify-end mt-4">
                        Registrar rol
                    </x-button>
                </form>


            </div>
        </div>

    </div>


    <div>
        <form autocomplete="off" wire:submit="update">
            <x-dialog-modal wire:model="open"
                class="backdrop-blur transition-colors duration-500  border border-zinc-300 dark:border-zinc-300 border-dashed supports-backdrop-blur:bg-white/60 dark:bg-transparent">

                <x-slot name="title">
                    <h4 class="uppercase text-slate-500 text-semibold">
                        Actualizar Rol
                    </h4>
                    <hr class="mb-4">
                </x-slot>

                <x-slot name="content">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">

                            <x-label>Nombre del rol</x-label>
                            <div class="mt-2">
                                <x-input wire:model="roleEdit.name" />
                            </div>
                        </div>


                    </div>
                    <hr class="my-4">
                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach ($permissions as $permission)
                            <label for=""
                                class="flex p-2 mb-4 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                <input wire:model.defer="roleEdit.permissions" type="checkbox" name="permissions[]"
                                    value="{{ $permission->id }}"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <span class="text-xs text-gray-500 ms-3">{{ $permission->description }}</span>
                            </label>
                        @endforeach
                    </div>

                </x-slot>


                <x-slot name="footer">
                    <div class="">
                        <x-danger-button class="mr-4" wire:click="$set('open', false)">
                            Cancelar
                        </x-danger-button>
                        <x-button>
                            Actualizar rol
                        </x-button>
                    </div>
                </x-slot>

            </x-dialog-modal>
        </form>
    </div>

</div>
