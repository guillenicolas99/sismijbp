<x-app-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de discípulos</h1>
        <a class="btn btn-green" href="{{ route('personas.create') }}">Crear discípulo</a>
    </div>
    @if (count($personas) >= 1)

        <x-table :columns="['#', 'Nombre', 'Cargo', 'Genero', 'Teléfono', 'Estado', 'Red', 'Acciones']">
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
                        {{ $persona->titulo?->nombre ?? 'Sin cargo' }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->genero }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->telefono }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $persona->is_active ? 'Activo' : 'Inactivo' }}
                    </x-tb-table>
                    <x-tb-table>
                        @if ($persona->red_id !== null)
                            <a href="{{ route('redes.show', $persona->red_id) }}">
                                {{ $persona->red?->nombre ?? 'Sin red' }}
                            </a>
                        @else
                            {{ $persona->red?->nombre ?? 'Sin red' }}
                        @endif

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
        @push('js')
            <script>
                const deleteForms = document.querySelectorAll('.delete-form')

                deleteForms.forEach(form => {
                    form.addEventListener('submit', e => {
                        e.preventDefault()
                        Swal.fire({
                            title: "¿Estás seguro?",
                            text: "No se podrá revertir el cambio",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "¡Si, eliminar!",
                            cancelButtonText: "¡Cancelar!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit()
                            }
                        });

                    })
                });
            </script>
        @endpush
    @else
        <x-alert-blue>No hay personas registrados</x-alert-blue>
    @endif
</x-app-layout>
