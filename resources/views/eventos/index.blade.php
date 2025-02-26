<x-app-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de evento</h1>
        <a class="btn btn-green" href="{{ route('eventos.create') }}">Crear evento</a>
    </div>

    @if (count($eventos) >= 1)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $evento->nombre }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $evento->fecha->format('D d / M / Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $evento->is_active ? 'Activo' : 'Inactivo' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-yellow">Editar</a>
                                    <x-form action="{{ route('eventos.destroy', $evento) }}" method="delete" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
        <x-alert-blue>No hay eventos registrados</x-alert-blue>
    @endif

</x-app-layout>
