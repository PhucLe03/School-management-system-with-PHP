<?php
session_start();

if (
    isset($_POST['title']) &&
    isset($_POST['content']) &&
    isset($_SESSION['id_lophoc'])
) {
    include "../../DB_connection.php";
    $id = $_SESSION['id_lophoc'];
    $tieude = $_POST['title'];
    $noidung = $_POST['content'];

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
        header("Location: ../thembaigiang.php?lopid=$id");
        exit;
    } else if ($miss_tieude == true) {
        $em  = "t"; $_SESSION['error'] = $em;
        $_SESSION['noidung'] = $noidung;
        header("Location: ../thembaigiang.php?lopid=$id");
        exit;
    } else if ($miss_noidung == true) {
        $em  = "c"; $_SESSION['error'] = $em;
        $_SESSION['tieude'] = $tieude;
        header("Location: ../thembaigiang.php?lopid=$id");
        exit;
    } else {
        // Thêm bài giảng
        
        $sql = "INSERT INTO baigiang (id_lophoc,tieude,noidung)
                VALUE (:id,:tt,:ct);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tt', $tieude);
        $stmt->bindParam(':ct', $noidung);
        $stmt->execute();
        header("Location: ../lop_view.php?id=$id");
        exit;
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../thembaigiang.php?lopid=$id");
    exit;
}
