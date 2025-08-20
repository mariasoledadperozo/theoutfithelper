async function mostrarMensajeFlash() {
    try {
        const response = await fetch('mssgController.php');
        const msg = await response.json();
        
        if (msg) {
            Swal.fire({
                icon: mensaje.icono,
                title: mensaje.titulo,
                text: mensaje.texto,
                confirmButtonText: 'OK',
                confirmButtonColor: mensaje.tipo === 'error' ? '#d33' : '#28a745'
            });
        }
    } catch (error) {
        console.log('Error al cargar mensaje:', error);
    }
}


window.addEventListener('load', mostrarMensajeFlash);