<x-app-layout>
    <div class="flex justify-evenly items-center mb-4">
        <h1 class="text-white">Lista de Tickets</h1>
        <a href="{{ route('categorias.create') }}">Agregar categoría</a>
        <a href="{{ route('tickets.create') }}">Agregar Tickets</a>
    </div>

    @if (count($tickets) >= 1)
        lista de tickets
    @else
        <x-alert-blue>No hay Tickets registrados</x-alert-blue>
    @endif
</x-app-layout>
