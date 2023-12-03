<?php
session_start();

if (
    isset($_POST['lopid']) &&
    isset($_POST['idbt'])
) {
    include "../../DB_connection.php";
    $lop = $_POST['lopid'];
    $bg = $_POST['idbt'];

    // Xóa bài tập
    
    $sql = "DELETE FROM baitap
            WHERE id_lophoc=:lop AND id_e=:bg;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lop', $lop);
    $stmt->bindParam(':bg', $bg);
    $stmt->execute();
    header("Location: ../lop_view.php?id=$lop");
    exit;
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../xoabaitap.php?lopid=$id");
    exit;
}
