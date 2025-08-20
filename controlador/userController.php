<?php
session_start();

function verifyLogIn(){
    include '../config/connection.php'; // Subir un nivel desde controlador/
    if(isset($_POST['login'])){
        // Código para login
    }
}

function verifySignUp(){
    include '../config/connection.php';
    
    if(isset($_POST['SignIn'])){
        // Escapar datos
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        
        $pfp = '';
        if(isset($_FILES['pfp']) && $_FILES['pfp']['error'] == 0) {
            $upload_dir = '../uploads/'; 
            $pfp_name = time() . '_' . basename($_FILES['pfp']['name']); 
            $pfp_path = $upload_dir . $pfp_name;
            
            if(move_uploaded_file($_FILES['pfp']['tmp_name'], $pfp_path)) {
                $pfp = 'uploads/' . $pfp_name; 
            }
        }
        
        $pass_encrypted = password_hash($pass, PASSWORD_DEFAULT);
        

        $sqluser = "SELECT username_user FROM username WHERE username_user = ?";
        $stmt = $conn->prepare($sqluser);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result_user = $stmt->get_result();
        
        if($result_user->num_rows > 0){
            $_SESSION['error_user_taken'] = "The username ".$username." is already taken, try another one.";
            header('Location: ../vistas/login.php'); 
            exit();
        }
        
        $sql_user = "INSERT INTO username(username_user, name_user, lastname_user, email_user, password_user, img_user) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_user);
        $stmt->bind_param("ssssss", $username, $name, $lastname, $email, $pass_encrypted, $pfp);
        
        if($stmt->execute()){
            $_SESSION['successful_user_created'] = "The user has been created successfully";
            header('Location: ../vistas/login.php'); 
            exit();
        } else {
            $_SESSION['error'] = "Error creating user: " . $conn->error;
            header('Location: ../vistas/login.php');
            exit();
        }
    }
}

if(isset($_POST['login'])){
    verifyLogIn();
}

if(isset($_POST['SignIn'])){
    verifySignUp();
}
?>