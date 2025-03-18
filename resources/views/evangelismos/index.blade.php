<x-app-layout>
    <div class="flex flex-col uppercase text-center text-gray-700 dark:text-white">
        <img src="img/logo/logo_blanco.png" alt="Logo Jesús el Buen Pastor">
        <h2 class="text-2xl md:text-1xl">Ministerio Internacional Jesús el Buen Pastor</h2>
        <h2 class="text-1xl md:text-1xl">Departamento de Afirmación</h2>
        <h2 class="text-1xl md:text-1xl">"AFIRMACIÓN Y SEGUIMIENTO DE LA COSECHA"</h2>
    </div>
    <a class="btn btn-green btnsss my-3" href="{{ route('evangelismos.create') }}">Agregar</a>
    <a class="btn btn-green btnsss my-3" href="{{ route('evangelismos.create') }}">Agregar</a>
    <x-alert-blue>No hay listado</x-alert-blue>

    @push('test')
        <script>
            console.log('hola js');
            const allAnchorBtns = document.querySelectorAll('.btnsss')

            allAnchorBtns.forEach((element, index) => {
                element.addEventListener('click', e => {
                    e.preventDefault()
                    console.log(`click anchor ${index}`)
                })
                console.log(element.classList)
            });
        </script>
    @endpush
</x-app-layout>
