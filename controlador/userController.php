<?php

function verifyLogIn(){
    include '../config/connection.php'; // Subir un nivel desde controlador/
    if(isset($_POST['login'])){
        // Código para login
    }
}

function verifySignUp(){
    session_start();
    include '../config/connection.php';
    
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email= mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        
        $pfp = '';
        if(isset($_FILES['pfp']) && $_FILES['pfp']['error'] == 0) {
            $upload_dir = '../assets/img/uploads/';
            $pfp = $upload_dir . basename($_FILES['pfp']['name']);
            move_uploaded_file($_FILES['pfp']['tmp_name'], $pfp);
        }

        $pass_encrypted = password_hash($pass, PASSWORD_DEFAULT);
        $sqluser="SELECT username_user FROM username WHERE username_user ='". $username."' ";
        $result_user = $conn -> query($sqluser);
        $rows_user = $result_user->num_rows;

            if($rows_user > 0){
                $_SESSION['mssg'] = 'An error has occurred. Try Again!'; 
                header('Location: ../vistas/login.php');
                exit();
            }
            
            $sql_user = "INSERT INTO username(username_user, name_user, lastname_user, email_user, password_user, img_user)
            VALUES('$username', '$name', '$lastname', '$email', '$pass_encrypted', '$pfp')";
            $result_user = $conn->query($sql_user);
            if($result_user){
                $_SESSION['mssg'] = 'The user has been created successfully!'; 
                header('Location: ../vistas/login.php');
                exit();
            }
    }


/*********************/

if(isset($_POST['login'])){
    verifyLogIn();
}

if(isset($_POST['SignIn'])){
    verifySignUp();
}
?>