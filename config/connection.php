<?php 
$host = "localhost";   
$dbname = "theoutfithelper";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $dbname);

if(mysqli_connect_errno()){
    echo "Error: ", mysqli_connect_error(); 
    exit();
} 
?>