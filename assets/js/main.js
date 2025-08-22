function showSessionAlert() {
    fetch('../controlador/messageController.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.has_session) {
                Swal.fire({
                    title: '¡Bienvenido!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            }
        })
        .catch(error => {
            console.error('Hubo un problema con la petición fetch:', error);
        });
}


document.addEventListener('DOMContentLoaded', showSessionAlert);