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

function pass(btn){
    const pass = document.getElementById("pass"); 
    const icon = document.getElementById("eye-state"); 


    if (document.getElementById("pass").type == "password"){
        pass.setAttribute('type', 'text'); 
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        pass.setAttribute('type', 'password'); 
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}