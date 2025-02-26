<x-app-layout>
    <x-form action="{{ route('personas.store') }}" method="post" buttonText="Crear" titleForm="Agregar">
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nombre" />
            <x-text-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Género" />
            <x-select-input name="genero">
                <option selected disabled>Seleccione el género</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </x-select-input>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Teléfono" />
            <x-text-input class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required
                autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Cédula" />
            <x-text-input class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" required
                autofocus />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Red" />

            <x-select-input name="red_id">
                <option selected disabled>Seleccione una red</option>
                @foreach ($redes as $red)
                    <option value="{{ $red->id }}">{{ $red->nombre }}</option>
                @endforeach
            </x-select-input>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <x-input-label value="Nivel de liderazgo" />

            <x-select-input name="titulo_id">
                <option selected disabled>Seleccione una título</option>
                @foreach ($titulos as $titulo)
                    <option value="{{ $titulo->id }}">{{ $titulo->nombre }}</option>
                @endforeach
            </x-select-input>
        </div>
    </x-form>
</x-app-layout>
