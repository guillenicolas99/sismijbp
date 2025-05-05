<x-app-layout>
    <div class="flex flex-col uppercase text-center text-gray-700 dark:text-white">
        <img src="img/logo/logo_blanco.png" alt="Logo Jesús el Buen Pastor">
        <h2 class="text-2xl md:text-1xl">Ministerio Internacional Jesús el Buen Pastor</h2>
        <h2 class="text-1xl md:text-1xl">Departamento de Afirmación</h2>
        <h2 class="text-1xl md:text-1xl">"AFIRMACIÓN Y SEGUIMIENTO DE LA COSECHA"</h2>
        <h4>Formato de seguimiento por redes</h4>
    </div>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Editar formato de seguimiento</h1>
        <a class="btn btn-green" href="{{ route('evangelismos.index') }}">Volver</a>
    </div>

    @if (session()->has('success'))
        <div id="toast-success" class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="flex-1">
                <p class="text-white">{{ session('success') }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div id="toast-error" class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="flex-1">
                <p class="text-white">{{ session('error') }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <x-table :columns="['Nombre', 'Fecha', 'Red', 'Acciones']">
        <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
            <x-tb-table>{{ $evangelismo->nombre }}</x-tb-table>
            <x-tb-table>{{ $evangelismo->fecha }}</x-tb-table>
            <x-tb-table>{{ $evangelismo->red->nombre }}</x-tb-table>
            <x-tb-table>
                <div class="flex space-x-2">
                    <a href="{{ route('evangelismos.show', $evangelismo) }}"
                        class="btn bg-cyan-700 hover:text-white hover:bg-cyan-800 text-gray-800 rounded">Ver
                        detalle</a>
                    <a href="{{ route('evangelismos.edit', $evangelismo) }}" class="btn btn-yellow">Editar</a>
                    <x-form action="{{ route('evangelismos.destroy', $evangelismo) }}" method="DELETE" />
                </div>
            </x-tb-table>
        </tr>
    </x-table>

</x-app-layout>
