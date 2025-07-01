document.addEventListener('DOMContentLoaded', function() {
    const modalOverlay = document.getElementById('ventana-Modal');
    const botonConfirmar = document.getElementById('confirmar');
    const botonCancelar = document.getElementById('cancelar');

    let urlEliminar = null;

    const botonesEliminar = document.querySelectorAll('.eliminar-Usuario');

    botonesEliminar.forEach(a => {
        a.addEventListener('click', function(event) {
            event.preventDefault();
            urlEliminar = this.getAttribute('href');
            modalOverlay.classList.add('active'); // Mostrar el modal
        });
    });

    botonConfirmar.addEventListener('click', function() {
        if (urlEliminar) {
            window.location.href = urlEliminar; // Redirigir a la URL de eliminación
        }
        modalOverlay.classList.remove('active'); // Ocultar el modal
        urlEliminar = null; // Reiniciar la URL
    });

    botonCancelar.addEventListener('click', function() {
        modalOverlay.classList.remove('active'); // Ocultar el modal
        urlEliminar = null; // Reiniciar la URL
    });
});
