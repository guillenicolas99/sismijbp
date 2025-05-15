<aside
    class="hidden-abono-aside fixed top-0 right-0 max-w-5/6 w-5/6 md:max-w-1/3 md:w-1/3 h-screen bg-gray-100 border-l border-gray-200 dark:bg-gray-900 dark:border-gray-700 overflow-y-auto p-2 md:p-4 shadow-md z-50">
    <div class="aside-body">
        <div class="w-full">
            <button class="close-abono h-4 w-4 text-white hover:text-gray-500 dark:hover:text-gray-400">
                <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="mt-4 flex flex-col gap-4 text-gray-500 dark:text-gray-400">
            @include('components.abono.skeleton')
            @include('components.abono.info')
        </div>
    </div>
</aside>

<style>
    .hidden-abono-aside {
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }

    .show-abono-aside {
        transform: translateX(0);
    }
</style>

<script>
    const abonoBtns = document.querySelectorAll('.abono-btn');
    const closeBtn = document.querySelector('.close-abono');
    const aside = document.querySelector('.hidden-abono-aside');
    const inputAbono = document.getElementById('abono');
    // const formAbono = document.getElementById('form-abono');

    let ticketData = null; // Variable global para almacenar los datos del ticket

    // Cerrar modal
    closeBtn.addEventListener('click', function() {
        aside.classList.remove('show-abono-aside');
        setTimeout(() => {
            inputAbono.value = '';
            document.getElementById('skeleton-abono').classList.remove('hidden');
            document.getElementById('info-abono').classList.add('hidden');
        }, 500);
    });

    // Abrir modal y cargar datos
    abonoBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const ticketCodigo = this.getAttribute('data-ticket-codigo')
            document.getElementById('form-abono').action = `/tickets/abonar-ticket/${ticketCodigo}`
            document.getElementById('form-abono').addEventListener('submit', function(e) {
                const abono = parseFloat(document.getElementById('abono').value);
                const precio = parseFloat(document.getElementById('ticket-precio').innerText);

                if (abono > precio) {
                    e.preventDefault();
                    alert('El abono no puede ser mayor al precio.');
                }

                if (abono < 0) {
                    e.preventDefault();
                    alert('El abono no puede ser menor a 0.');
                }
            })


            // Mostrar modal
            aside.classList.add('show-abono-aside');

            // Mostrar loading
            document.getElementById('skeleton-abono').classList.remove('hidden');
            document.getElementById('info-abono').classList.add('hidden');

            // Cargar datos del ticket
            fetch('/eventos/getTicketInfo/' + ticketCodigo)
                .then(response => response.json())
                .then(data => {
                    ticketData = data; // Guardar datos para usar en el submit

                    document.getElementById('ticket-precio').innerText = data.precio;
                    document.getElementById('ticket-abonado').innerText = data.abono;
                    document.getElementById('ticket-responsable').innerText = data
                        .nombreResponsable + ' ' + data.apellidoResponsable;
                    document.getElementById('ticket-codigo').innerText = data.codigo;
                    document.getElementById('ticket-titulo').innerText =
                        `Ticket: ${data.codigo} - ${data.categoria}`;
                })
                .catch(error => {
                    console.error('Error al obtener ticket:', error);
                    alert('No se pudo cargar la información del ticket.');
                })
                .finally(() => {
                    document.getElementById('skeleton-abono').classList.add('hidden');
                    document.getElementById('info-abono').classList.remove('hidden');
                });
        });
    });
</script>
