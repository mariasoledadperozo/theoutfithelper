<?php 


function generateRandomPiece($pieceType) {
    include __DIR__ . '/../config/connection.php';
    $userId = $_SESSION['user'];

    $sql = $conn->prepare('SELECT COUNT(*) as total FROM piece WHERE type_piece = ? AND id_user = ?');
    $sql->bind_param("si", $pieceType, $userId);
    $sql->execute();
    $result_piece = $sql->get_result();
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

        $sql = $conn->prepare('SELECT img_piece FROM piece WHERE type_piece = ? AND id_user = ? ORDER BY RAND() LIMIT 1');
        $sql->bind_param("si", $pieceType, $userId);
        $sql->execute();
        $result_piece = $sql->get_result();
        $row_piece = $result_piece->fetch_assoc();

        $_SESSION['actualPiecePic'] = $row_piece['img_piece'];

        return '
        <div class="card-button">
            <section class="card-clothing">
                <button class="arrow-button">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <img src="/theoutfithelper/assets/img/' . $pieceType . '/' . $row_piece['img_piece'] . '" alt="Clothing Item ' . $pieceType . '" id="clothing-img">
                <button class="arrow-button">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </section>
            <a href="/controlador/pieceController.php">
                <button class="shuffle-button">shuffle!</button>
            </a>
        </div>';
    }
}


function uploadPieces() {
    session_start();
    include __DIR__ . '/../config/connection.php';

    $type = $_POST['type'];
    $color = $_POST['color'];
    $user = $_SESSION['user'];

    $pictures = $_FILES['pictures'];
    $uploaddir = '../assets/img/' . $type . '/';

    foreach ($pictures['tmp_name'] as $index => $tmpName) {
        $namePiece = $pictures['name'][$index];
        $imgType = strtolower(pathinfo($namePiece, PATHINFO_EXTENSION));

        if ($imgType == "jpg" || $imgType == "jpeg" || $imgType == "png") {
            $newFileName = uniqid("piece_") . "." . $imgType;
            $dir = $uploaddir . $newFileName;

            if (move_uploaded_file($tmpName, $dir)) {
                $sql = $conn->prepare("INSERT INTO piece (name_piece, type_piece, color_piece, img_piece, id_user) 
                                       VALUES (?, ?, ?, ?, ?)");
                $sql->bind_param("ssssi", $namePiece, $type, $color, $newFileName, $user);

                if (!$sql->execute()) {
                    $_SESSION['mssg'] = 'Some pieces could not be uploaded.';
                }
            } else {
                $_SESSION['mssg'] = 'Some pieces could not be uploaded.';
            }
        } else {
            $_SESSION['mssg'] = 'All files must be in jpg, jpeg, or png format.';
        }
    }

    $_SESSION['mssg'] = 'The pieces have been uploaded successfully.';
    header('Location: ../vistas/editcloset.php');
    exit();
}
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
            $_SESSION['mssg'] = 'Theres no more clothing pieces saved'; 
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

    function lastPiece($pieceType, $actualPiece){
        session_start(); 
         include __DIR__ . '/../config/connection.php';
         $actualPiece = $actualPiece - 1; 
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
              $_SESSION['mssg'] = 'Theres no more clothing pieces saved'; 
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

    function deletePiece(){

    }; 

function showAllPieces($pieceType) {
    include __DIR__ . '/../config/connection.php';
    $userId = $_SESSION['user'];
    
    $sql = $conn->prepare("SELECT img_piece FROM piece WHERE id_user = ? AND type_piece = ?");
    $sql->bind_param("ss", $userId, $pieceType);
    $sql->execute();
    $resultPiece = $sql->get_result();

    if ($resultPiece->num_rows === 0) {
        $_SESSION['mssg'] = 'There are no pieces available.';
        return '<p>No pieces available.</p>';
    } else {
        $output = '';
        while ($rowPiece = $resultPiece->fetch_assoc()) {
            $output .= '
                <div class="piece-card">
                    <button>
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <img class="piece-img" src="../assets/img/' . $pieceType . '/' . $rowPiece['img_piece'] . '" alt="">
                </div>';
        }
        return $output;
    }
}


    /***********/ 

    if(isset($_POST['upload-piece'])){
        uploadPieces();
    }
?>