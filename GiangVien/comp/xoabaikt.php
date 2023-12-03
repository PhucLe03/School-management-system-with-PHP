<?php
session_start();

if (
    isset($_POST['lopid']) &&
    isset($_POST['idbkt'])
) {
    include "../../DB_connection.php";
    $lop = $_POST['lopid'];
    $bg = $_POST['idbkt'];

    // Xóa bài kt
    
    $sql = "DELETE FROM kiemtra
            WHERE id_lophoc=:lop AND id_t=:bg;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lop', $lop);
    $stmt->bindParam(':bg', $bg);
    $stmt->execute();
    header("Location: ../lop_view.php?id=$lop");
    exit;
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../xoabaikt.php?lopid=$id");
    exit;
}
