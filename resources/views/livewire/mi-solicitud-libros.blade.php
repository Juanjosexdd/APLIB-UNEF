<div x-data="{
    fechaPrestamo: @entangle('fechaPrestamo').defer,
    fechaDevolucion: @entangle('fechaDevolucion').defer
}">
<x-contenedor>
    <!-- Encabezado del Formulario -->
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Solicitud de Libros
            </h2>
            <p class="text-sm text-gray-600">
                Completa la información para solicitar libros.
            </p>
        </div>
    </div>

    <!-- Formulario para agregar libros -->
    <div class="grid grid-cols-3 gap-4 p-4">
        <!-- Seleccionar libro -->
        <div>
            <label for="libro" class="block text-sm font-medium text-gray-700">Libros:</label>
            <select id="libro" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                wire:model="selectedLibro">
                <option value="">Seleccione un libro</option>
                @foreach ($librosDisponibles as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <!-- Observación del libro -->
        <div>
            <label for="observacionProducto" class="block text-sm font-medium text-gray-700">Observación:</label>
            <x-input type="text" id="observacionProducto" wire:model="observacionProducto"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                placeholder="Observación del producto" />
        </div>

        <!-- Cantidad de libros -->
        <div>
            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
            <x-input type="number" id="cantidad" min="1" wire:model="cantidad"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Cantidad" />
        </div>

        <!-- Campo de fecha de préstamo -->
        <div>
            <label for="fechaPrestamo" class="block text-sm font-medium text-gray-700">Fecha de Préstamo:</label>
            <input type="date" id="fechaPrestamo" x-model="fechaPrestamo"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="{{ now()->toDateString() }}"
                @change="fechaDevolucion = new Date(new Date($event.target.value).getTime() + 3 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]" />
        </div>

        <!-- Campo de fecha de devolución -->
        <div>
            <label for="fechaDevolucion" class="block text-sm font-medium text-gray-700">Fecha de Devolución:</label>
            <input type="date" id="fechaDevolucion" x-model="fechaDevolucion"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                :min="fechaPrestamo ? new Date(new Date(fechaPrestamo).getTime() + 1 * 24 * 60 * 60 * 1000).toISOString().split('T')[0] : '{{ now()->toDateString() }}'"
                :max="fechaPrestamo ? new Date(new Date(fechaPrestamo).getTime() + 3 * 24 * 60 * 60 * 1000).toISOString().split('T')[0] : '{{ now()->toDateString() }}'" />
        </div>

        <!-- Botón Agregar -->
        <div class="flex items-center justify-end mt-6">
            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700"
                wire:click="agregarLibro">Agregar</button>
        </div>
    </div>

    <!-- Lista de libros seleccionados -->
    @if (count($librosSeleccionados) > 0)
        <table class="min-w-full divide-y divide-gray-200 mt-4 border">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th scope="col" class="text-left text-sm font-medium uppercase tracking-wider"></th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Libro</th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Cantidad</th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Observación</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($librosSeleccionados as $index => $libro)
                    <tr>
                        <!-- Botón Eliminar -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button type="button" class="text-red-600 hover:text-red-900"
                                wire:click="eliminarLibro({{ $index }})">X</button>
                        </td>
                        <!-- Nombre del libro -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $libro['titulo'] }}</td>
                        <!-- Cantidad de libros -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <input type="number" min="1"
                                wire:model="librosSeleccionados.{{ $index }}.cantidad"
                                class="block w-full rounded-md border-gray-300 shadow-sm">
                        </td>
                        <!-- Observación del libro -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <input type="text" wire:model="librosSeleccionados.{{ $index }}.observacion"
                                class="block w-full rounded-md border-gray-300 shadow-sm">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="px-6 py-4 text-center text-sm text-gray-500">No hay libros seleccionados.</div>
    @endif

    <!-- Botones Guardar y Cancelar -->
    <div class="flex justify-between mt-4 p-4">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700"
            wire:click="cancelar">Cancelar</button>
        <button type="button" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700"
            wire:click="guardarSolicitud">Guardar</button>
    </div>

    <!-- Mensaje de Confirmación -->
    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
            {{ session('message') }}
        </div>
    @endif
</x-contenedor>
</div>
