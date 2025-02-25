<x-app-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de discípulos</h1>
        <a class="inline-flex items-center px-4 py-2 bg-green-700 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-900 dark:hover:green-900 focus:bg-gray-700 dark:focus:green-900 active:green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            href="{{ route('personas.create') }}">Crear discípulo</a>
    </div>
    @if (count($personas) >= 1)

        <x-table :columns="['#', 'Nombre', 'Genero', 'Teléfono', 'Estado', 'Red', 'Acciones']">
            @foreach ($personas as $persona)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>
                        {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->nombre }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->genero }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->telefono }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->is_active }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->red?->nombre ?? 'Sin red' }}
                    </x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('personas.edit', $persona) }}"
                                class="inline-flex items-center px-4 py-2 bg-yellow-700 dark:bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-yellow-900 dark:hover:yellow-900 focus:bg-gray-700 dark:focus:yellow-900 active:yellow-900 dark:active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                            <form class="delete-form" action="{{ route('personas.destroy', $persona) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-danger-button>Eliminar</x-danger-button>
                            </form>
                        </div>
                    </x-tb-table>
                </tr>
            @endforeach
        </x-table>
    @else
        <x-alert-blue>No hay personas registrados</x-alert-blue>
    @endif
</x-app-layout>
