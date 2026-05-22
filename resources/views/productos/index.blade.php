<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mantenimiento de Productos - OXXO Al Toque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Mensaje de éxito (aparece después de crear, editar o eliminar) --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between mb-4">
                    <p class="text-gray-900 font-medium">Catálogo de Productos</p>
                    <a href="{{ route('productos.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        + Agregar Producto
                    </a>
                </div>

                <table class="w-full border-collapse border border-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-200 px-4 py-2 text-left">#</th>
                            <th class="border border-gray-200 px-4 py-2 text-left">Nombre</th>
                            <th class="border border-gray-200 px-4 py-2 text-left">Descripción</th>
                            <th class="border border-gray-200 px-4 py-2 text-left">Precio</th>
                            <th class="border border-gray-200 px-4 py-2 text-left">Stock Mínimo</th>
                            <th class="border border-gray-200 px-4 py-2 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $producto->nombre }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $producto->descripcion ?? '—' }}</td>
                                <td class="border border-gray-200 px-4 py-2">S/. {{ number_format($producto->precio, 2) }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $producto->stock_critico }}</td>
                                <td class="border border-gray-200 px-4 py-2 text-center space-x-2">

                                    {{-- Botón Editar --}}
                                    <a href="{{ route('productos.edit', $producto) }}"
                                       class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition text-xs">
                                        Editar
                                    </a>

                                    {{-- Botón Eliminar (usa un formulario porque DELETE no se puede hacer con un link) --}}
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-xs">
                                            Eliminar
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-6">
                                    No hay productos registrados aún.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
