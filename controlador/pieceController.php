<?php 

function generateRandomPiece($pieceType){
          include __DIR__ . '/../config/connection.php';

$sql = 'SELECT COUNT(*) as total FROM piece WHERE type_piece = "'.$pieceType.'" AND id_user = '.$_SESSION['user'];
$result_piece = $conn->query($sql);

$row = $result_piece->fetch_assoc();
$rows_piece = $row['total'];

if ($rows_piece < 1) {
    return '
    <div class="card-button">
        <section class="card-clothing">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <img src="/theoutfithelper/assets/img/defaultpiece.jpg" alt="Clothing Item" id="clothing-img">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </section>
        <a href="/controlador/pieceController.php">
            <button class="shuffle-button">shuffle!</button>
        </a>
    </div>';
} else {
    $sql = 'SELECT img_piece 
            FROM piece 
            WHERE type_piece = "'.$pieceType.'" 
              AND id_user = '.$_SESSION['user'].' 
            ORDER BY RAND() LIMIT 1';
    $result_piece = $conn->query($sql);
    $row_piece = $result_piece->fetch_assoc();

    if ($pieceType == 'T') $folder = 'top';
    else if ($pieceType == 'B') $folder = 'bottom';
    else if ($pieceType == 'S') $folder = 'shoes';
    $_SESSION['actualPiecePic'] = $row_piece['img_piece']; 

    return '
    <div class="card-button">
        <section class="card-clothing">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <img src="/theoutfithelper/assets/img/'.$folder.'/'.$row_piece['img_piece'].'" alt="Clothing Item '.$folder.'" id="clothing-img">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </section>
        <a href="/controlador/pieceController.php">
            <button class="shuffle-button">shuffle!</button>
        </a>
    </div>';
}

          };
function uploadPiece() {
    session_start(); 
    include __DIR__ . '/../config/connection.php';

    if (!isset($_SESSION['user'])) {
        die("Usuario no autenticado");
    }

    $type = $_POST['type']; 
    $color = $_POST['color']; 
    $user = $_SESSION['user']; 

    $pic = $_FILES['picture']['tmp_name'];
    $namePiece = $_FILES['picture']['name'];
    $imgType = strtolower(pathinfo($namePiece, PATHINFO_EXTENSION));


    $uploaddir = '../assets/img/'.$type.'/';


    if($imgType == "jpg" || $imgType == "jpeg" || $imgType == "png") {
        $newFileName = uniqid("piece_").".".$imgType; 
        $dir = $uploaddir.$newFileName;

        if (move_uploaded_file($pic, $dir)) {

            $sql = $conn->prepare("INSERT INTO piece (name_piece, type_piece, color_piece, img_piece, id_user) 
                                   VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("ssssi", $namePiece, $type, $color, $newFileName, $user);

            if ($sql->execute()) {
                $_SESSION['mssg'] = 'The piece has been uploaded succesfully'; 
                header('Location: ../vistas/editcloset.php');
                exit();
            } else {
                $_SESSION['mssg'] = 'The piece could not be uploaded'; 
                header('Location: ../vistas/editcloset.php');
                exit();
            }
        } else {
              $_SESSION['mssg'] = 'The piece could not be uploaded'; 
                header('Location: ../vistas/editcloset.php');
                exit();
        }
    } else {
          $_SESSION['mssg'] = 'The document must be jpg, jpeg or png format'; 
                header('Location: ../vistas/editcloset.php');
                exit();
    }
}; 
    function nextPiece($pieceType, $actualPiece){
         session_start(); 
         include __DIR__ . '/../config/connection.php';
         $actualPiece = $actualPiece + 1; 
         $sql = $conn->prepare('SELECT * FROM piece 
         WHERE id_piece = ? 
         AND type_piece = ?
         AND id_user = ?'); 

        try{
         $sql->bind_param("sss", $_SESSION['user'], $pieceType, $actualPiece);
         $resultPiece= $conn->query($sql); 
         $rowPiece = $resultPiece->fetch_assoc(); 
         
         return '
    <div class="card-button">
        <section class="card-clothing">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <img src="/theoutfithelper/assets/img/'.$pieceType.'/'.$rowPiece['img_piece'].'" alt="Clothing Item '.$pieceType.'" id="clothing-img">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </section>
        <a href="/controlador/pieceController.php">
            <button class="shuffle-button">shuffle!</button>
        </a>
    </div>'; 
        }catch(error){
             return '
             <div class="card-button">
        <section class="card-clothing">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <img src="/theoutfithelper/assets/img/'.$pieceType.'/'.$_SESSION['actualPiecePic'] .'" alt="Clothing Item '.$pieceType.'" id="clothing-img">
            <button class="arrow-button">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </section>
        <a href="/controlador/pieceController.php">
            <button class="shuffle-button">shuffle!</button>
        </a>
    </div>'; 
        };

    };

    function lastPiece(){

    }; 

    function deletePiece(){

    }; 

    function showAllPieces($pieceType){
        
    }

    /***********/ 

    if(isset($_POST['upload-piece'])){
        uploadPiece();
    }
?>