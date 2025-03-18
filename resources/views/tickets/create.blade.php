<x-app-layout>
    <x-back-button />

    <x-form action="{{route('tickets.store')}}" method="post" buttonText="Crear" titleForm="Agregar ticket" cancel="tickets.index">
    </x-form>
</x-app-layout>
