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

                if (data.message.includes("successfully")) {
                    toastr.success(data.message, 'Successfully!'); 
                } else {
                    toastr.error(data.message, 'Error'); 
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

document.addEventListener('DOMContentLoaded', showSessionAlert);