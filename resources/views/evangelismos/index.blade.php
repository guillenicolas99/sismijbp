<x-app-layout>
    <div class="flex flex-col uppercase text-center text-gray-700 dark:text-white justify-center items-center">
        <img src="https://scontent.fmga7-1.fna.fbcdn.net/v/t39.30808-6/323697647_683341046604584_8593209438002846430_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=iIkhXHJNthMQ7kNvgHYpqpA&_nc_oc=AdmFLUFpWv-zJfPxuLucY5TsIJKm_x1MZ0Cbauoq0_rEoCWA9z89OVOt3rg9Evh-t3U&_nc_zt=23&_nc_ht=scontent.fmga7-1.fna&_nc_gid=5a_hmwxpdBZtee-Fa4E0ug&oh=00_AYGeFAcN_zYAE3G_uI6KcXFLXaek_UWZqnFWPJJZbz3ipg&oe=67E8CF61" alt="Logo Jesús el Buen Pastor" class="w-24 h-24 mb-3 rounded-full shadow-lg text-center mx-auto">
        <h2 class="text-2xl md:text-1xl">Ministerio Internacional Jesús el Buen Pastor</h2>
        <h2 class="text-1xl md:text-1xl">Departamento de Afirmación</h2>
        <h2 class="text-1xl md:text-1xl">"AFIRMACIÓN Y SEGUIMIENTO DE LA COSECHA"</h2>
        <h4>Listado de seguimiento por redes</h4>
    </div>



    <!-- MODA AGREGAR MES DE SEGUIMIENTO -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="btn btn-green my-5" type="button">
        Agregar
    </button>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Crear formato de seguimiento
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('evangelismos.store') }}" method="POST">
                    <x-error-forms />
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="fecha"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mes de
                                seguimiento</label>
                            <input type="month" name="fecha" id="mes"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Red</label>
                            <select name="red_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Seleccione el red</option>
                                @foreach ($redes as $red)
                                    <option value="{{ $red->id }}">{{ $red->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>

    @if ($grupos->isEmpty())
        <x-alert-blue>No hay listado</x-alert-blue>
    @else
        <x-table :columns="['Nombre', 'Fecha', 'Red', 'Acciones']">
            @foreach ($grupos as $grupo)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>{{ $grupo->nombre }}</x-tb-table>
                    <x-tb-table>{{ $grupo->fecha->format('M/Y') }}</x-tb-table>
                    <x-tb-table>{{ $grupo->red->nombre }}</x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('evangelismos.show', $grupo) }}"
                                class="btn bg-cyan-700 hover:text-white hover:bg-cyan-800 text-gray-800 rounded">Ver
                                detalle</a>
                            <a href="{{ route('evangelismos.edit', $grupo) }}" class="btn btn-yellow">Editar</a>
                            <x-form action="{{ route('evangelismos.destroy', $grupo) }}" method="DELETE" />
                        </div>
                    </x-tb-table>
                </tr>
            @endforeach
        </x-table>
    @endif
</x-app-layout>
