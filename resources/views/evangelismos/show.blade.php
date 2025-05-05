<x-app-layout>
    <div
        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mx-auto mb-4">
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
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Editar</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Descargar</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Eliminar</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-center pb-10 text-center">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                src="https://scontent.fmga7-1.fna.fbcdn.net/v/t39.30808-6/323697647_683341046604584_8593209438002846430_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=iIkhXHJNthMQ7kNvgHYpqpA&_nc_oc=AdmFLUFpWv-zJfPxuLucY5TsIJKm_x1MZ0Cbauoq0_rEoCWA9z89OVOt3rg9Evh-t3U&_nc_zt=23&_nc_ht=scontent.fmga7-1.fna&_nc_gid=5a_hmwxpdBZtee-Fa4E0ug&oh=00_AYGeFAcN_zYAE3G_uI6KcXFLXaek_UWZqnFWPJJZbz3ipg&oe=67E8CF61"
                alt="Bonnie image" />
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $evangelismo->nombre }}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400"><strong>Red</strong>:
                {{ $evangelismo->red->nombre }}</span>
            <div class="flex mt-4 md:mt-6">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Agregar persona
                </button>
                <a href="{{ route('evangelismos.index') }}"
                    class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver</a>
            </div>
        </div>
    </div>

    @if ($grupoPersonas->count() > 0)
        <x-table :columns="['Nombres', 'apellidos', 'dirección', 'correo', 'fecha', 'edad', 'estado', 'Acciones']">
            @foreach ($grupoPersonas as $persona)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-tb-table>{{ $persona->nombres }}</x-tb-table>
                    <x-tb-table>{{ $persona->apellidos }}</x-tb-table>
                    <x-tb-table>{{ $persona->direccion }}</x-tb-table>
                    <x-tb-table>{{ $persona->correo }}</x-tb-table>
                    <x-tb-table>{{ $persona->fecha->format('D d/M/Y') }}</x-tb-table>
                    <x-tb-table>{{ $persona->edad }}</x-tb-table>
                    <x-tb-table>{{ $persona->is_active ? 'Activo' : 'Inactivo' }}</x-tb-table>
                    <x-tb-table>
                        <div class="flex space-x-2">
                            <a href="{{ route('personasSeguimiento.show', $persona) }}"
                                class="btn bg-cyan-700 hover:text-white hover:bg-cyan-800 text-gray-800 rounded">Ver
                                detalle</a>
                            <a href="{{ route('personasSeguimiento.edit', $persona) }}"
                                class="btn btn-yellow">Editar</a>
                            <form action="{{ route($persona->is_active ? 'personasSeguimiento.disable' : 'personasSeguimiento.enable', $persona->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button class="btn {{$persona->is_active ? 'bg-red-700' : 'bg-cyan-700'}} hover:text-white hover:bg-cyan-800 text-gray-800 rounded">
                                    {{ $persona->is_active ? 'Desactivar' : 'Activar' }}
                                </button>
                            </form>
                        </div>
                    </x-tb-table>
                </tr>
            @endforeach
        </x-table>
    @else
        <h2 class="text-center text-white">No hay personas en este grupo</h2>
    @endif

    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full  max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-lg border border-gray-600 dark:bg-gray-800">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Agregar persona a {{ $evangelismo->nombre }}
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form action="{{ route('personasSeguimiento.store') }}" method="post">
                        @csrf
                        <x-error-forms />

                        <input type="hidden" name="grupo_seguimiento_id" value="{{ $evangelismo->id }}">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Nombres" />
                                <x-text-input class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')"
                                    autofocus />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Apellidos" />
                                <x-text-input class="block mt-1 w-full" type="text" name="apellidos"
                                    :value="old('apellidos')" autofocus />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Teléfono" />
                                <x-text-input class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')"
                                    autofocus />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Telefonía" />
                                <x-select-input name="telefonia_id">
                                    <option selected disabled>Seleccione</option>
                                    @foreach ($telefonias as $telefono)
                                        <option value="{{ $telefono->id }}"
                                            {{ old('telefonia_id') == $telefono->id ? 'selected' : '' }}>
                                            {{ $telefono->nombre }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Fecha que se llenó la boleta" />
                                <x-text-input class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')"
                                    autofocus />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Edad" />
                                <x-text-input class="block mt-1 w-full" type="number" name="edad"
                                    :value="old('edad')" autofocus />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Género" />
                                <x-select-input name="genero">
                                    <option selected disabled>Seleccione el género</option>
                                    <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino
                                    </option>
                                    <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino
                                    </option>
                                </x-select-input>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Dirección" />
                                <x-text-input class="block mt-1 w-full" type="text" name="direccion"
                                    :value="old('direccion')" autofocus />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Correo" />
                                <x-text-input class="block mt-1 w-full" type="email" name="correo"
                                    :value="old('correo')" autofocus />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Aceptó/reconcilió" />
                                <x-select-input name="aceptacion">
                                    <option selected disabled>Seleccione</option>
                                    <option value="Ninguno" {{ old('aceptacion') == 'Ninguno' ? 'selected' : '' }}>
                                        Ninguno</option>
                                    <option value="Reconcilio"
                                        {{ old('aceptacion') == 'Reconcilio' ? 'selected' : '' }}>Reconcilio
                                    </option>
                                    <option value="Aceptación"
                                        {{ old('aceptacion') == 'Aceptación' ? 'selected' : '' }}>Aceptación
                                    </option>
                                </x-select-input>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="MIEMBRO /INVITADO/ 1RA VEZ" />
                                <x-select-input name="invitacion">
                                    <option selected disabled>Seleccione</option>
                                    <option value="Miembro" {{ old('invitacion') == 'Miembro' ? 'selected' : '' }}>
                                        Miembro</option>
                                    <option value="Invitado" {{ old('invitacion') == 'Invitado' ? 'selected' : '' }}>
                                        Invitado</option>
                                    <option value="1ra vez" {{ old('invitacion') == '1ra vez' ? 'selected' : '' }}>1ra
                                        vez</option>
                                </x-select-input>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label value="Consolidador" />
                                <x-select-input name="consolidador_id">
                                    <option selected disabled>Seleccione</option>
                                    @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}"
                                            {{ old('consolidador_id') == $persona->id ? 'selected' : '' }}>
                                            {{ $persona->nombre }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 my-3">

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="is_baptized" :value="old('is_baptized')"
                                    autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="¿Es bautizado?" />
                            </div>

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="is_call_answer" :value="old('is_call_answer')"
                                    autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="¿Respondió llamada?" />
                            </div>
                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="is_current_visitor"
                                    :value="old('is_current_visitor')" autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="¿Asiste a la iglesia?" />
                            </div>

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="is_in_cpz" :value="old('is_in_cpz')"
                                    autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="Asiste a cpz" />
                            </div>

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="is_back_to_church"
                                    :value="old('is_back_to_church')" autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="¿Ha regresado a la iglesia?" />
                            </div>

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="had_number" :value="old('had_number')"
                                    autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="¿Tiene número?" />
                            </div>

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="is_phone_on" :value="old('is_phone_on')"
                                    autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="¿Celular apagado?" />
                            </div>

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="is_from_other_church"
                                    :value="old('is_from_other_church')" autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="¿Asiste a otra iglesia?" />
                            </div>

                            <div class="flex items-center mb-4">
                                <x-text-input class="" type="checkbox" name="other" :value="old('other')"
                                    autofocus />
                                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    value="Otro" />
                            </div>
                        </div>

                        <div class="flex flex-col mb-4">
                            <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                value="Comentarios" />

                            <textarea name="cometario" rows="3"
                                class="block mt-1 w-full h-20 text-sm text-gray-900 dark:text-gray-300 dark:bg-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                autofocus>
                                </textarea>
                        </div>

                        <button class="btn btn-green" type="submit">Agregar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
