<x-app-layout>
    <div class="flex justify-evenly items-center mb-4">
        <h1 class="text-white">Lista de niveles de liderazgo</h1>
        <a class="inline-flex items-center px-4 py-2 bg-green-700 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-900 dark:hover:green-900 focus:bg-gray-700 dark:focus:green-900 active:green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            href="{{ route('titulos.create') }}">Agregar nuevo nivel</a>
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
                        {{ $titulo->nombre }}
                    </x-tb-table>
                    <x-tb-table>
                        {{ $titulo->created_at }}
                    </x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('titulos.edit', $titulo) }}"
                                class="inline-flex items-center px-4 py-2 bg-yellow-700 dark:bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-yellow-900 dark:hover:yellow-900 focus:bg-gray-700 dark:focus:yellow-900 active:yellow-900 dark:active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                            <form class="delete-form" action="{{ route('titulos.destroy', $titulo) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-danger-button>Eliminar</x-danger-button>
                            </form>
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
