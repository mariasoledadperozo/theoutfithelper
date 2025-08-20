<?php 
        session_start(); 
        header('Content-Type: application/json');
        $mssg = null; 

        if(isset($_SESSION['error_user_taken'])){
                $mensaje = array(
                'type' => 'error',
                'title' => 'Username is taken',
                'text' => $_SESSION['error_user_taken'],
                'icon' => 'error'
            );
            unset($_SESSION['error_user_taken']); 
        }

        echo json_encode($mssg);
?>