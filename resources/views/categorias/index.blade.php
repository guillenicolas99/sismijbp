<x-app-layout>

    <x-back-button />
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de categorías</h1>
        <a class="btn btn-green" href="{{ route('categorias.create') }}">Crear categoría</a>
    </div>
    @if (count($categorias) >= 1)
        <x-table :columns="['#', 'Nombre', 'Creado', 'Acciones']">
            @foreach ($categorias as $categoria)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>
                        {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $categoria->nombre }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $categoria->created_at }}
                    </x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-yellow">Edit</a>
                            <x-form action="{{ route('categorias.destroy', $categoria) }}" method="DELETE" />
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
        <x-alert-blue>No hay categorías registrados</x-alert-blue>
    @endif


</x-app-layout>
