<x-app-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de evento</h1>
        <a class="inline-flex items-center px-4 py-2 bg-green-700 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-900 dark:hover:green-900 focus:bg-gray-700 dark:focus:green-900 active:green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            href="{{ route('eventos.create') }}">Crear evento</a>
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
                                    <a href="{{ route('eventos.edit', $evento->id) }}"
                                        class="inline-flex items-center px-4 py-2 bg-yellow-700 dark:bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-yellow-900 dark:hover:yellow-900 focus:bg-gray-700 dark:focus:yellow-900 active:yellow-900 dark:active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Editar</a>

                                    <form class="delete-form" action="{{ route('eventos.destroy', $evento) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button>Eliminar</x-danger-button>
                                    </form>
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
