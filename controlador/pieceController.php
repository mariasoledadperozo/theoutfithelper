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
    function uploadPiece($pieceType){

    };
    function nextPiece($pieceType){

    };
    function deletePiece(){

    }; 
?>