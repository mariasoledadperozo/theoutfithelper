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
                if (data.message.includes("successfully") || data.message.includes("logged") ) {
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

function pass(btn, ico){
    const pass = document.getElementById(btn); 
    const icon = document.getElementById(ico); 


    if (document.getElementById(btn).type == "password"){
        pass.setAttribute('type', 'text'); 
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        pass.setAttribute('type', 'password'); 
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}

function popUp(){
    const popUp = document.getElementById('overlay-pop-up');
    const hasClass = popUp.classList.contains('d-none'); 
    if(hasClass == true){
       popUp.classList.remove('d-none');
    }else{
        popUp.classList.add('d-none');
    }
    
}