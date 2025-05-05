<x-app-layout>

    <div
        class="max-w-xl bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col md:flex-row overflow-hidden">
        <img class="rounded-t-lg" {{-- src="{{ $evento->imagen ? asset('storage/' . $evento->imagen) : asset('img/no-image.png') }}" --}}
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3J4sONi1cglrZQBhRu7LajUu7dHCjXhb_Fg&s"
            alt="" />
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $evento->nombre }}
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Fecha:</strong>
                {{ $evento->fecha->format('D d / M / Y') }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <strong>Descripción:</strong>{{ $evento->descripcion ?? 'No hay descripción.' }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <strong>Estado:</strong> {{ $evento->is_active ? 'Activo' : 'Inactivo' }}
            </p>
            <a href="{{ route('eventos.edit', $evento) }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Editar
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>

    <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 my-4">
        <x-text-input type="text" name="codigo" value="{{ request('codigo') }}" placeholder="Buscar por código" />

        <x-select-input name="categoria_id">
            <option value="">-- Categoría --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </x-select-input>

        <x-select-input name="estado_id" class="border px-2 py-1 rounded">
            <option value="">-- Estado --</option>
            @foreach ($estados as $estado)
                <option value="{{ $estado->id }}" {{ request('estado_id') == $estado->id ? 'selected' : '' }}>
                    {{ $estado->nombre }}
                </option>
            @endforeach
        </x-select-input>

        <x-select-input name="red_id" class="border px-2 py-1 rounded">
            <option value="">-- Red --</option>
            @foreach ($redes as $red)
                <option value="{{ $red->id }}" {{ request('red_id') == $red->id ? 'selected' : '' }}>
                    {{ $red->nombre }}
                </option>
            @endforeach
        </x-select-input>

        <button type="submit" class="btn btn-green text-center">Buscar</button>
    </form>

    @if (count($tickets) >= 1)

        <div class="flex justify-between items-center my-4">
            <h1 class="text-2xl text-white">Lista de tickets</h1>
            <a class="btn btn-green" href="{{ route('tickets.create', $evento) }}">Crear ticket</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table :columns="['#', 'Código', 'Asignado a', 'Categoría', 'Precio', 'Descuento', 'Abono', 'Estado', 'Acciones']">
                @foreach ($tickets as $ticket)
                    <tr
                        class="border-b dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 {{ $loop->iteration % 2 == 0 ? 'bg-gray-700' : 'bg-gray-800' }}">
                        <x-tb-table>
                            {{ $loop->iteration }} {{-- Número de iteración automáticamente --}}
                        </x-tb-table>
                        <x-tb-table>
                            {{ $ticket->codigo }}
                        </x-tb-table>
                        <x-tb-table>
                            {{ $ticket->persona ? $ticket->persona->nombre : 'No asignado' }}
                        </x-tb-table>
                        <x-tb-table>
                            {{ $categorias->where('id', $ticket->categoria_id)->first()->nombre }}
                        </x-tb-table>
                        <x-tb-table>
                            ${{ $ticket->precio }}
                        </x-tb-table>
                        <x-tb-table>
                            ${{ $ticket->descuento }}
                        </x-tb-table>
                        <x-tb-table>
                            ${{ $ticket->abono }}
                        </x-tb-table>
                        <x-tb-table>
                            {{ $estados->where('id', $ticket->estado_id)->first()->nombre }}
                        </x-tb-table>
                        <x-tb-table>
                            <div class="flex space-x-2">
                                @if ($ticket->abono < $ticket->precio)
                                    <button class="btn btn-green abono-btn" title="{{ $ticket->codigo }}" data-ticket-codigo="{{ $ticket->codigo }}">Abonar</button>
                                @else
                                    <button class="btn btn-red">Ver detalles</button>
                                @endif
                            </div>
                        </x-tb-table>
                    </tr>
                @endforeach
            </x-table>
            <div class="my-3">
                {{ $tickets->links() }}
            </div>
        </div>
    @else
        <div class="my-4">
            <x-alert-blue>No hay tickets registrados</x-alert-blue>
        </div>
    @endif

    <x-abono />
</x-app-layout>
