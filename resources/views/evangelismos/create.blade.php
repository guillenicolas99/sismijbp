<x-app-layout>
    <x-form action="{{ route('evangelismos.store') }}" method="post" buttonText="Agregar"
        titleForm="Agregar - Departamento de Evangelismo y Afirmación" cancel="evangelismos.index">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Nombres y apellidos" />
                <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Teléfono" />
                <x-text-input class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Edad" />
                <x-text-input class="block mt-1 w-full" type="number" name="edad" :value="old('edad')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Género" />
                <x-select-input name="genero">
                    <option selected disabled>Seleccione el género</option>
                    <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Aceptó/reconcilió" />
                <x-select-input name="aceptacion">
                    <option selected disabled>Seleccione</option>
                    <option value="Ninguno" {{ old('aceptacion') == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                    <option value="Reconcilio" {{ old('aceptacion') == 'Reconcilio' ? 'selected' : '' }}>Reconcilio</option>
                    <option value="Aceptación" {{ old('aceptacion') == 'Aceptación' ? 'selected' : '' }}>Aceptación</option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Dirección" />
                <x-text-input class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Correo" />
                <x-text-input class="block mt-1 w-full" type="email" name="correo" :value="old('correo')" autofocus />
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="MIEMBRO /INVITADO/ 1RA VEZ" />
                <x-select-input name="invitacion">
                    <option selected disabled>Seleccione</option>
                    <option value="Miembro" {{ old('invitacion') == 'Miembro' ? 'selected' : '' }}>Miembro</option>
                    <option value="Invitado" {{ old('invitacion') == 'Invitado' ? 'selected' : '' }}>Invitado</option>
                    <option value="1ra vez" {{ old('invitacion') == '1ra vez' ? 'selected' : '' }}>1ra vez</option>
                </x-select-input>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Hermano mayor" />
                <x-select-input name="hermano_mayor">
                    <option selected disabled>Seleccione</option>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}" {{ old('hermano_mayor') == 'M' ? 'selected' : '' }}>
                            {{ $persona->nombre }}</option>
                    @endforeach
                </x-select-input>
            </div>
        </div>

        <div class="flex flex-wrap gap-4 my-3">

            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="is_call_answer" :value="old('is_call_answer')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="Respondió llamada" />
            </div>
            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="is_current_visitor" :value="old('is_current_visitor')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="Asiste a la iglesia" />
            </div>

            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="is_in_cpz" :value="old('is_in_cpz')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="Asiste a cpz" />
            </div>

            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="is_back_to_church" :value="old('is_back_to_church')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="Ha regresado a la iglesia" />
            </div>

            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="had_number" :value="old('had_number')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="¿Tiene número?" />
            </div>

            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="is_phone_on" :value="old('is_phone_on')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="Celular apagado?" />
            </div>

            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="is_from_other_church" :value="old('is_from_other_church')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="Asiste a otra iglesia" />
            </div>

            <div class="flex items-center mb-4">
                <x-text-input class="" type="checkbox" name="other" :value="old('other')" autofocus />
                <x-input-label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" value="Otro" />
            </div>
        </div>

    </x-form>
</x-app-layout>
