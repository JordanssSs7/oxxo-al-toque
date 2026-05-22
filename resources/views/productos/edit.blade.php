<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('productos.update', $producto) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" required
                               value="{{ old('nombre', $producto->nombre) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio (S/.)</label>
                            <input type="number" name="precio" id="precio" step="0.01" min="0" required
                                   value="{{ old('precio', $producto->precio) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="stock_critico" class="block text-sm font-medium text-gray-700">Stock Alerta Mínima</label>
                            <input type="number" name="stock_critico" id="stock_critico" min="0" required
                                   value="{{ old('stock_critico', $producto->stock_critico) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 pt-4">
                        <a href="{{ route('productos.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-600 transition">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">
                            Guardar Cambios
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
