@if ($method === 'DELETE' || $method === 'delete')
    <form class="delete-form" action="{{ $action }}" method="post">
        @csrf
        @method('delete')
        <x-danger-button>Eliminar</x-danger-button>
    </form>
@else
    <x-card-form>
        <x-title-form>{{ $titleForm }}</x-title-form>

        <x-error-forms />

        <form class="mx-auto" action="{{ $action }}" method="post">
            @csrf
            @if ($method !== 'POST' || $method !== 'post')
                @method($method)
            @endif

            <!-- Aquí van los campos del formulario -->
            {{ $slot }}


            <!-- Botón de acción -->
            <x-primary-button>
                {{ $buttonText }}
            </x-primary-button>
            <a class="btn btn-red" href="{{route($cancel)}}">Cancelar</a>
        </form>
    </x-card-form>
@endif
