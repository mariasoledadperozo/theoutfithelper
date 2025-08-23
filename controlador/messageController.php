<?php
session_start();

$response = [
    'has_session' => false,
    'message' => ''
];

if(isset($_SESSION['mssg'])){
    $response['has_session'] = true;
    $response['message'] = $_SESSION['mssg'];
    unset($_SESSION['mssg']);
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>