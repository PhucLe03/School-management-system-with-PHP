<?php
session_start();

if (
    isset($_POST['title']) &&
    isset($_POST['content']) &&
    isset($_SESSION['id_bg']) && isset($_SESSION['id_lophoc'])
) {
    include "../../DB_connection.php";
    $id = $_SESSION['id_bg'];
    $cid = $_SESSION['id_lophoc'];
    $tieude = $_POST['title'];
    $noidung = $_POST['content'];
    
    $_SESSION['tieude'] = $tieude;
    $_SESSION['noidung'] = $noidung;
    
    $miss_tieude = false;
    $miss_noidung = false;

    if (empty($tieude)) {
        $miss_tieude = true;
    }
    if (empty($noidung)) {
        $miss_noidung = true;
    }

    if ($miss_tieude == true && $miss_noidung == true) {
        $em  = "tnc"; $_SESSION['error'] = $em;
        header("Location: ../suabaigiang.php?lopid=$id&id=$cid");
        exit;
    } else if ($miss_tieude == true) {
        $em  = "t"; $_SESSION['error'] = $em;
        header("Location: ../suabaigiang.php?lopid=$id&id=$cid");
        exit;
    } else if ($miss_noidung == true) {
        $em  = "c"; $_SESSION['error'] = $em;
        header("Location: ../suabaigiang.php?lopid=$id&id=$cid");
        exit;
    } else {
        // Sửa bài giảng
        
        $sql = "UPDATE baigiang
                SET tieude=:tt , noidung=:ct
                WHERE id_l=:id;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tt', $tieude);
        $stmt->bindParam(':ct', $noidung);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        unset($_SESSION['tieude']); unset($_SESSION['noidung']);
        header("Location: ../baigiang.php?id=$id");
        exit;
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../suabaigiang.php?lopid=$id&id=$cid");
    exit;
}
