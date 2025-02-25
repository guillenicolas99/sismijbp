<x-app-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Lista de redes</h1>
        <a class="inline-flex items-center px-4 py-2 bg-green-700 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-900 dark:hover:green-900 focus:bg-gray-700 dark:focus:green-900 active:green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            href="{{ route('redes.create') }}">Crear Red</a>
    </div>

    @if (count($redes) >= 1)

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
                    @foreach ($redes as $red)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $red->nombre }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $red->lider_de_red }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $red->created_at }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <x-alert-blue>No hay redes registrados</x-alert-blue>
    @endif

</x-app-layout>
