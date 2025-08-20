<?php

    include '/theoutfithelper/config/connection.php';

    function verifyLogIn(){
        session_start();
        include '/theoutfithelper/config/connection.php';
        if(isset($_POST['login'])){

        }
    }

    function verifySignUp(){
        session_start();
        include '/theoutfithelper/config/connection.php';
        if(isset($_POST['signup'])){
                $name = mysqli_real_escape_string($conn, $_POST['name']); 
                $username = mysqli_real_escape_string($conn, $_POST['username']); 
                $lastname = mysqli_real_escape_string($conn, $_POST['lastname']); 
                $pass = mysqli_real_escape_string($conn, $_POST['pass']); 
                $pfp = mysqli_real_escape_string($conn, $_POST['pfp']); 

                $pass_encrypted = sha1($pass); 
                $sqluser="SELECT username_user FROM username WHERE username_user ='". $username."' "; 
                $result_user = $conn -> query($sqluser);
                $rows_user = $result_user->num_rows;

                if($rows_user > 0){
                       $_session['error_user_taken']="The username ".$username." is already taken, try another one."; 
                       header('location: ../vistas/login.php'); 
                }

        }
    }
?>