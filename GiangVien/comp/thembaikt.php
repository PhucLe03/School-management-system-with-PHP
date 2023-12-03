<?php
session_start();

if (
    isset($_POST['title']) &&
    isset($_POST['content']) &&
    isset($_POST['time']) &&
    isset($_SESSION['id_lophoc'])
) {
    include "../../DB_connection.php";
    $id = $_SESSION['id_lophoc'];
    $tieude = $_POST['title'];
    $noidung = $_POST['content'];
    $thoigian = $_POST['time'];
    
    $_SESSION['tieude'] = $tieude;
    $_SESSION['noidung'] = $noidung;
    $_SESSION['tg'] = $thoigian;
    
    $miss_tieude = false;
    $miss_noidung = false;
    $miss_tg = false;

    if (empty($tieude)) {
        $miss_tieude = true;
    }
    if (empty($noidung)) {
        $miss_noidung = true;
    }
    if (empty($thoigian)) {
        $miss_tg = true;
    }

    if ($miss_tieude == true && $miss_noidung == true && $miss_tg == true) {
        $em  = "all"; $_SESSION['error'] = $em;
        header("Location: ../thembaikt.php?lopid=$id");
        exit;
    } else if ($miss_tieude == true && $miss_noidung == true) {
        $em  = "tnc"; $_SESSION['error'] = $em;
        header("Location: ../thembaikt.php?lopid=$id");
        exit;
    } else if ($miss_tieude == true && $miss_tg == true) {
        $em  = "ttg"; $_SESSION['error'] = $em;
        header("Location: ../thembaikt.php?lopid=$id");
        exit;
    } else if ($miss_tg == true && $miss_noidung == true) {
        $em  = "ctg"; $_SESSION['error'] = $em;
        header("Location: ../thembaikt.php?lopid=$id");
        exit;
    } else if ($miss_tieude == true) {
        $em  = "t"; $_SESSION['error'] = $em;
        header("Location: ../thembaikt.php?lopid=$id");
        exit;
    } else if ($miss_noidung == true) {
        $em  = "c"; $_SESSION['error'] = $em;
        header("Location: ../thembaikt.php?lopid=$id");
        exit;
    } else if ($miss_tg == true) {
        $em  = "tg"; $_SESSION['error'] = $em;
        header("Location: ../thembaikt.php?lopid=$id");
        exit;
    } else {
        // Thêm bài kt
        unset($_SESSION['tieude']); unset($_SESSION['noidung']); unset($_SESSION['tg']);
        $sql = "INSERT INTO kiemtra (id_lophoc,tieude,noidung,thoigian)
                VALUE (:id,:tt,:ct,:tg);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tt', $tieude);
        $stmt->bindParam(':ct', $noidung);
        $stmt->bindParam(':tg', $thoigian);
        $stmt->execute();
        header("Location: ../lop_view.php?id=$id");
        exit;
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../thembaikt.php?lopid=$id");
    exit;
}
