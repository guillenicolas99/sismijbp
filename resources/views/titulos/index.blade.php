<x-app-layout>
    <div class="flex justify-evenly items-center mb-4">
        <h1 class="text-white">Lista de niveles de liderazgo</h1>
        <a class="btn btn-green" href="{{ route('titulos.create') }}">Agregar nuevo nivel</a>
    </div>

    @if (count($titulos) >= 1)
        <x-table :columns="['#', 'Nombre', 'Fecha', 'Acciones']">
            @foreach ($titulos as $titulo)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>
                        {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                    </x-tb-table>
                    <x-tb-table>
                        <a href="{{ route('titulos.show', $titulo) }}">
                            {{ $titulo->nombre }}
                        </a>
                    </x-tb-table>
                    <x-tb-table>
                        {{ $titulo->created_at }}
                    </x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('titulos.edit', $titulo) }}" class="btn btn-yellow">Edit</a>
                            <x-form action="{{ route('titulos.destroy', $titulo) }}" method="DELETE" />
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
        <x-alert-blue>No hay títulos registrados</x-alert-blue>
    @endif
</x-app-layout>
