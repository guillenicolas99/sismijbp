<x-app-layout>
    <x-back-button />

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de discipulados</h1>
        <a class="btn btn-green" href="{{ route('discipulados.create') }}">Agregar Discipulado</a>
    </div>

    @if (count($discipulados) >= 1)
        <x-table :columns="['#', 'Mentores', 'Red', 'Estado', 'Acciones']">
            @foreach ($discipulados as $discipulado)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>
                        {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $discipulado->mentor_1->nombre }}
                        {{ $discipulado->mentor_2?->nombre != null ? " y {$discipulado->mentor_2?->nombre}" : '' }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $discipulado->red?->nombre ?? 'Sin Red' }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $discipulado->is_active ? 'Activo' : 'Inactivo' }}
                    </x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('discipulados.edit', $discipulado->id) }}" class="btn btn-yellow">Editar</a>
                            <x-form action="{{ route('discipulados.destroy', $discipulado->id) }}" method="DELETE" />
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
        <x-alert-blue>No hay discipulados registrados</x-alert-blue>
    @endif

</x-app-layout>
