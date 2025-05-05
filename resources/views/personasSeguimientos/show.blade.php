<x-app-layout>
    <div class="flex flex-col uppercase text-center text-gray-700 dark:text-white justify-center items-center">
        <img src="https://scontent.fmga7-1.fna.fbcdn.net/v/t39.30808-6/323697647_683341046604584_8593209438002846430_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=iIkhXHJNthMQ7kNvgHYpqpA&_nc_oc=AdmFLUFpWv-zJfPxuLucY5TsIJKm_x1MZ0Cbauoq0_rEoCWA9z89OVOt3rg9Evh-t3U&_nc_zt=23&_nc_ht=scontent.fmga7-1.fna&_nc_gid=5a_hmwxpdBZtee-Fa4E0ug&oh=00_AYGeFAcN_zYAE3G_uI6KcXFLXaek_UWZqnFWPJJZbz3ipg&oe=67E8CF61"
            alt="Logo Jesús el Buen Pastor" class="w-24 h-24 mb-3 rounded-full shadow-lg text-center mx-auto">
        <h2 class="text-2xl md:text-1xl">Ministerio Internacional Jesús el Buen Pastor</h2>
        <h2 class="text-1xl md:text-1xl">Departamento de Afirmación</h2>
        <h2 class="text-1xl md:text-1xl">"AFIRMACIÓN Y SEGUIMIENTO DE LA COSECHA"</h2>
        <h4>Formato de seguimiento por redes</h4>
    </div>

    <div class="flex justify-between items-center mb-4">
        <a class="btn btn-green"
            href="{{ route('evangelismos.show', $personasSeguimiento->grupo_seguimiento_id) }}">Volver</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mx-auto md:sticky md:top-16"
            style="height: max-content;">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="{{ route('personasSeguimiento.edit', $personasSeguimiento) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <form action="{{ route('personasSeguimiento.destroy', $personasSeguimiento) }}"
                                method="POST"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white flex items-center">
                    <span
                        class="flex w-3 h-3 me-3  {{ $personasSeguimiento->is_active ? 'bg-green-500' : 'bg-red-500' }} rounded-full"></span>
                    <strong>Nombre: </strong>
                    {{ $personasSeguimiento->nombres }} {{ $personasSeguimiento->apellidos }}
                </h5>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Telefono: </strong>
                    {{ $personasSeguimiento->telefono }} ({{ $personasSeguimiento->telefonia->nombre }})</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Edad: </strong>
                    {{ $personasSeguimiento->edad }} años</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Fecha que se llenó
                        la boleta: </strong>
                    {{ $personasSeguimiento->fecha->format('D d/M/Y') }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Genero:</strong>
                    {{ $personasSeguimiento->genero == 'M' ? 'Masculino' : 'Femenino' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Dirección:
                    </strong>{{ $personasSeguimiento->direccion }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Consolidador:
                    </strong>
                    {{ $personasSeguimiento->consolidador->nombre }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Correo: </strong>
                    {{ $personasSeguimiento->correo }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Bautizado?
                    </strong>{{ $personasSeguimiento->is_baptized ? 'Si' : 'No' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Asiste a la
                        iglesia?
                    </strong>{{ $personasSeguimiento->is_current_visitor ? 'Si' : 'No' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Asiste a casa de
                        paz?
                    </strong>{{ $personasSeguimiento->is_in_cpz ? 'Si' : 'No' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Regresó a la
                        iglesia?
                    </strong>{{ $personasSeguimiento->is_back_to_church ? 'Si' : 'No' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Había número?
                    </strong>{{ $personasSeguimiento->had_number ? 'Si' : 'No' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Celular apagado?
                    </strong>{{ $personasSeguimiento->is_phone_on ? 'Si' : 'No' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Visita otra
                        iglesia?
                    </strong>{{ $personasSeguimiento->is_from_other_church ? 'Si' : 'No' }}</span>
                <span
                    class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>Otro:</strong>{{ $personasSeguimiento->other ? 'Si' : 'No' }}</span>
                <span class="text-gray-500 dark:text-gray-400 border-b border-gray-700 mb-3"><strong>¿Contestó llamada?
                    </strong>{{ $personasSeguimiento->is_call_answer ? 'Si' : 'No' }}</span>
            </div>
        </div>
        {{-- COMENTARIOS DE LA PERSONA SEGUIMIENTO --}}
        <div class="flex flex-col">
            <h2 class="text-2xl md:text-1xl text-white mb-3">Observaciones</h2>

            <form action="{{ route('comentarios.store') }}" method="post" class="w-full">
                @csrf
                <input type="hidden" name="persona_seguimiento_id" value="{{ $personasSeguimiento->id }}">
                <div class="w-full mb-5 group">
                    <textarea name="comentario"
                        class="block mt-1 w-full h-20 text-sm text-gray-900 dark:text-gray-300 dark:bg-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <button class="btn btn-green" type="submit">Agregar</button>
            </form>

            @if ($comentarios?->count() > 0)
                <ol class="relative border-s border-gray-200 dark:border-gray-700 mt-5">
                    @foreach ($comentarios as $comentario)
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <img class="rounded-full shadow-lg"
                                    src="https://scontent.fmga7-1.fna.fbcdn.net/v/t39.30808-6/323697647_683341046604584_8593209438002846430_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=iIkhXHJNthMQ7kNvgHYpqpA&_nc_oc=AdmFLUFpWv-zJfPxuLucY5TsIJKm_x1MZ0Cbauoq0_rEoCWA9z89OVOt3rg9Evh-t3U&_nc_zt=23&_nc_ht=scontent.fmga7-1.fna&_nc_gid=5a_hmwxpdBZtee-Fa4E0ug&oh=00_AYGeFAcN_zYAE3G_uI6KcXFLXaek_UWZqnFWPJJZbz3ipg&oe=67E8CF61"
                                    alt="Bonnie image" />
                            </span>
                            <div
                                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-xs sm:flex dark:bg-gray-700 dark:border-gray-600">
                                <time
                                    class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $comentario->created_at->format('D d/M/Y') }}</time>
                                <div class="text-sm font-normal text-gray-500 dark:text-gray-300">
                                    {{ $comentario->comentario }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @else
                <h2 class="text-2xl md:text-1xl text-white">No hay observaciones</h2>
            @endif
        </div>
    </div>
</x-app-layout>
