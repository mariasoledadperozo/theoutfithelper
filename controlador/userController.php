<?php

function verifyLogIn(){
    include '../config/connection.php';
    if(isset($_POST['login'])){
      session_start();
      $user = mysqli_real_escape_string($conn, $_POST['user']);
      $pass = mysqli_real_escape_string($conn, $_POST['pass']);

      $sql = "SELECT id_user, password_user, name_user FROM username WHERE username_user='".$user."'";
      $result = $conn ->query($sql);

      if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $hashed_password = $row['password_user'];

        if(password_verify($pass, $hashed_password)){
            $_SESSION['user'] = $row['id_user'];
            $_SESSION['mssg'] = 'You’re now logged in';
            $_SESSION['name'] = $row['name_user']; 
            header('Location: ../index.php');
            exit(); 
        } else {
            $_SESSION['mssg'] = 'User or password not found';
            header('Location: ../vistas/login.php');
            exit();
        }
      } else {
         $_SESSION['mssg'] = 'User or password not found';
         header('Location: ../vistas/login.php');
         exit();
      }
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


        $pass_encrypted = password_hash($pass, PASSWORD_DEFAULT);
        $sqluser="SELECT username_user FROM username WHERE username_user ='". $username."' ";
        $result_user = $conn -> query($sqluser);
        $rows_user = $result_user->num_rows;

            if($rows_user > 0){
                $_SESSION['mssg'] = 'An error has occurred. Try Again!'; 
                header('Location: ../vistas/login.php');
                exit();
            }
            
            $sql_user = "INSERT INTO username(username_user, name_user, lastname_user, email_user, password_user)
            VALUES('$username', '$name', '$lastname', '$email', '$pass_encrypted')";
            $result_user = $conn->query($sql_user);
            if($result_user){

                    if(isset($_FILES['pfp'])){
                            $pfp = $_FILES['pfp']['tmp_name'];
                            $imgName = $_FILES['pfp']['name'];
                            $imgType = strtoLower(pathinfo($imgName, PATHINFO_EXTENSION)); 
                            $sizeImg = $_FILES['pfp']['size'];
                            $sizeImg = $sizeImg / 1000; 
                            $upload_dir = '../assets/img/uploads/';

                                if($imgType == "jpg" or $imgType == "jpeg" or $imgType == "png"){
                                     $idUser = $conn->insert_id; 
                                    $newFileName = uniqid("pfp_").".".$imgType; 
                                    $dir = $upload_dir.$newFileName;
                                }else{
                                $_SESSION['mssg'] = 'The file must be in .jpg, .png, or .jpeg format.'; 
                                header('Location: ../vistas/sigin.php');
                                exit();
                                };
                                }else{
                                $idUser = $conn->insert_id;
                                $sql = "INSERT INTO profilepicture(ID_USER, ID_IMG) VALUES ($idUser, 'default.jpg')";
                                $conn->query($sql);
                                };  


                $_SESSION['mssg'] = 'The user has been created successfully!'; 
                header('Location: ../vistas/login.php');
                exit();
            }
    }

    function closeSession(){
        session_start(); 
        session_destroy(); 
        header('Location: ../vistas/login.php');
        exit();
    }



/*********************/

if(isset($_POST['login'])){
    verifyLogIn();
}

if(isset($_POST['SignIn'])){
    verifySignUp();
}

if(isset($_GET['action'])){
    closeSession(); 
}
?>