<x-app-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de evento</h1>
        <a class="btn btn-green" href="{{ route('eventos.create') }}">Crear evento</a>
    </div>

    @if (count($eventos) >= 1)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table :columns="['#', 'Nombre', 'Fecha', 'Estado', 'Acciones']">
                @foreach ($eventos as $evento)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <x-tb-table>
                            {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                        </x-tb-table>
                        <x-tb-table>
                            {{ $evento->nombre }}
                        </x-tb-table>
                        <x-tb-table>
                            {{ $evento->fecha->format('D d / M / Y') }}
                        </x-tb-table>
                        <x-tb-table>
                            {{ $evento->is_active ? 'Activo' : 'Inactivo' }}
                        </x-tb-table>
                        <x-tb-table>
                            <div class="flex space-x-2">
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-white rounded-lg hover:bg-yellow-700 bg-yellow-600">Editar</a>  
                                <a href="{{ route('tickets.asignar', $evento->id) }}"
                                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Asignar</a>
                                <a href="{{ route('eventos.show', $evento) }}"
                                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-white rounded-lg hover:bg-cyan-700 bg-cyan-600">
                                    Detalles
                                </a>
                                <x-form action="{{ route('eventos.destroy', $evento) }}" method="delete" />
                            </div>
                        </x-tb-table>
                    </tr>
                @endforeach
            </x-table>
        </div>
    @else
        <x-alert-blue>No hay eventos registrados</x-alert-blue>
    @endif

</x-app-layout>
