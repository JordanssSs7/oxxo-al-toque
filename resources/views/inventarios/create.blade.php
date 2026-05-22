<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Movimiento de Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('inventarios.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="producto_id" class="block text-gray-700 text-sm font-bold mb-2">Producto:</label>
                            <select name="producto_id" id="producto_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">-- Seleccione un Producto --</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }} (Stock actual: {{ $producto->stock_actual }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Movimiento:</label>
                            <select name="tipo" id="tipo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="entrada">Entrada (Abastecimiento / Compra)</option>
                                <option value="salida">Salida (Venta / Merma / Ajuste)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-6">
                            <label for="motivo" class="block text-gray-700 text-sm font-bold mb-2">Motivo / Descripción:</label>
                            <input type="text" name="motivo" id="motivo" placeholder="Ej: Compra de lote, Producto vencido, etc." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('inventarios.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Guardar Movimiento
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>