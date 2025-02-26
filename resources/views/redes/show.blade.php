<x-app-layout>
    <x-back-button />

    <x-title-form>Discípulos de la red {{ $red->nombre }}</x-title-form>

    @if (count($personas) >= 1)
        <x-table :columns="['#', 'Nombre', 'Genero', 'Cargo', 'Teléfono', 'Estado', 'Acciones']">
            @foreach ($personas as $persona)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>
                        {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                    </x-tb-table>
                    <x-tb-table>
                        <a href="{{ route('personas.show', $persona) }}">
                            {{ $persona->nombre }}
                        </a>
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->genero }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->titulo?->nombre ?? 'Sin cargo' }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->telefono }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->is_active ? 'Activo' : 'Inactivo' }}
                    </x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('personas.edit', $persona) }}" class="btn btn-yellow">Edit</a>
                            <x-form action="{{ route('personas.destroy', $persona) }}" method="delete" />
                        </div>
                    </x-tb-table>
                </tr>
            @endforeach
        </x-table>
    @else
        <x-alert-blue>NO HAY DISCÍPULOS</x-alert-blue>
    @endif
</x-app-layout>
