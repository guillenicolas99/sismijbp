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
    const abonoBtns = document.querySelectorAll('.abono-btn')
    const closeBtn = document.querySelector('.close-abono')

    closeBtn.addEventListener('click', function() {
        const aside = document.querySelector('.hidden-abono-aside')
        const inputAbonon = document.getElementById('abono')
        aside.classList.remove('show-abono-aside')
        setTimeout(() => {
            inputAbonon.value = ''
            document.getElementById('skeleton-abono').classList.remove('hidden')
            document.getElementById('info-abono').classList.add('hidden')
        }, 500)
    })

    abonoBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const aside = document.querySelector('.hidden-abono-aside')
            const ticketCodigo = this.getAttribute('data-ticket-codigo')

            fetch('/eventos/getTicketInfo/' + ticketCodigo)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('ticket-precio').innerText = data.precio;
                    document.getElementById('ticket-abonado').innerText = data.abono;
                    document.getElementById('ticket-responsable').innerText = data.responsable;
                    document.getElementById('ticket-codigo').innerText = data.codigo;
                    document.getElementById('ticket-titulo').innerText =
                        `Ticket: ${data.codigo} - ${data.categoria}`;

                    const formAbono = document.getElementById('form-abono');
                    formAbono.addEventListener('submit', e => {
                        e.preventDefault()
                        const abonoInput = document.getElementById('abono').value;
                        if (abonoInput > data.precio) {
                            return alert('¡El monto no puede ser mayor a el precio!');
                        } else if (abonoInput > 0 && abonoInput <= data.precio) {
                            return alert('¡Gracias por tu pago!');
                        } else {
                            return alert('¡El monto debe ser mayor a 0!');
                        }
                    })

                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                    document.getElementById('skeleton-abono').classList.add('hidden');
                    document.getElementById('info-abono').classList.remove('hidden');
                });

            aside.classList.add('show-abono-aside')
        })
    })
</script>
