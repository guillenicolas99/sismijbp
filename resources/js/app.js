import './bootstrap';
import 'flowbite';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

console.log('hola mundo app.js')

if (document.querySelector('.delete-form')) {
    console.log('hola mundo app.js')
    const deleteForms = document.querySelectorAll('.delete-form')

    deleteForms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault()
            Swal.fire({
                title: "¿Estás seguro?",
                text: "No se podrá revertir el cambio",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, eliminar!",
                cancelButtonText: "¡Cancelar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                }
            });

        })
    });
}