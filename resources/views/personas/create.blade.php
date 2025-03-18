<x-app-layout>
    <x-form action="{{ route('personas.store') }}" method="post" buttonText="Agregar" titleForm="Agregar"
        cancel="personas.index">

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" autofocus />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Género" />
                <x-select-input name="genero">
                    <option selected disabled>Seleccione el género</option>
                    <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                </x-select-input>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Teléfono" />
                <x-text-input class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Cédula" />
                <x-text-input class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" autofocus />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Estado Civil" />
                <x-select-input name="is_single">
                    <option selected disabled>Seleccione</option>
                    <option value="0" {{ old('is_single') == '0' ? 'selected' : '' }}>Casado</option>
                    <option value="1" {{ old('is_single') == '1' ? 'selected' : '' }}>Soltero</option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Bautizado" />
                <x-select-input name="is_baptized">
                    <option selected disabled>Seleccione</option>
                    <option value="0" {{ old('is_baptized') == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('is_baptized') == '1' ? 'selected' : '' }}>Si</option>
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Red" />

                <x-select-input name="red_id">
                    <option selected disabled>Seleccione una red</option>
                    <option value="">Sin red</option>
                    @foreach ($redes as $red)
                        <option value="{{ $red->id }}">{{ $red->nombre }}</option>
                    @endforeach
                </x-select-input>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Título" />

                <x-select-input name="titulo_id">
                    <option selected disabled>Seleccione una título</option>
                    <option value="">Sin título</option>
                    @foreach ($titulos as $titulo)
                        <option value="{{ $titulo->id }}">{{ $titulo->nombre }}</option>
                    @endforeach
                </x-select-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label value="Discipulado que pertenece" />

                <x-select-input name="discipulado_id">
                    <option selected disabled>Seleccione mentores</option>
                    <option value="">Sin mentores</option>
                    @foreach ($discipulados as $discipulado)
                        <option value="{{ $discipulado->id }}">
                            {{ $discipulado->mentor_1 }}
                        </option>
                    @endforeach
                </x-select-input>
            </div>
        </div>
    </x-form>
</x-app-layout>
