<?php
session_start();

if (
    isset($_POST['lopid']) &&
    isset($_POST['idbg'])
) {
    include "../../DB_connection.php";
    $lop = $_POST['lopid'];
    $bg = $_POST['idbg'];

    // Xóa bài giảng
    
    $sql = "DELETE FROM baigiang
            WHERE id_lophoc=:lop AND id_l=:bg;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lop', $lop);
    $stmt->bindParam(':bg', $bg);
    $stmt->execute();
    header("Location: ../lop_view.php?id=$lop");
    exit;
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../xoabaigiang.php?lopid=$id");
    exit;
}
