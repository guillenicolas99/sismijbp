<x-app-layout>
    <x-back-button />

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de redes</h1>
        <a class="btn btn-green" href="{{ route('redes.create') }}">Crear Red</a>
    </div>

    @if (count($redes) >= 1)
        <x-table :columns="['#', 'Nombre', 'Estado', 'Líder de Red', 'Acciones']">
            @foreach ($redes as $red)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>
                        {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                    </x-tb-table>
                    <x-tb-table>
                        <a href="{{ route('redes.show', $red) }}">
                            {{ $red->nombre }}
                        </a>
                    </x-tb-table>
                    <x-tb-table>
                        {{ $red->is_active ? 'Activo' : 'Inactivo' }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $red->lider_de_red }}
                    </x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('redes.edit', $red->id) }}" class="btn btn-yellow">Editar</a>
                            <x-form action="{{ route('redes.destroy', $red->id) }}" method="DELETE" />
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
        <x-alert-blue>No hay redes registrados</x-alert-blue>
    @endif

</x-app-layout>
