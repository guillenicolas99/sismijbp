<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl text-white">Departamento de Evangelismo y Afirmación</h1>
        <a class="btn btn-green" href="{{ route('evangelismos.create') }}">Agregar</a>
    </div>
    <x-alert-blue>No hay listado</x-alert-blue>
</x-app-layout>