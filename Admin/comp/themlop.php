<?php
session_start();

function checkClass($id_lophoc, $mamon, $conn)
{
    $sql = "SELECT * FROM lophoc
            WHERE makhoahoc=:co AND malophoc=:cl;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':co', $mamon);
    $stmt->bindParam(':cl', $id_lophoc);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

if (
    isset($_POST['khoa']) &&
    isset($_POST['lop']) &&
    isset($_POST['gv'])
) {
    include "../../DB_connection.php";
    $khoa = $_POST['khoa'];
    $lop = $_POST['lop'];
    $gv = $_POST['gv'];

    $_SESSION['course'] = $khoa;
    $_SESSION['class'] = $lop;
    $_SESSION['lecturer'] = $gv;

    if (empty($khoa) || empty($lop) || empty($gv)) {
        $em  = "m";
        $_SESSION['error'] = $em;
        header("Location: ../addclass.php");
        exit;
    } else {
        // Check
        if (checkClass($lop, $khoa, $conn)) {
            $em  = "e";
            $_SESSION['error'] = $em;
            header("Location: ../addclass.php");
            exit;
        }
        // Thêm lớp
        unset($_SESSION['course']);
        unset($_SESSION['class']);
        unset($_SESSION['lecturer']);
        $sql = "INSERT INTO lophoc (makhoahoc,malophoc,magiangvien)
                VALUE (:co,:cl,:le);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':co', $khoa);
        $stmt->bindParam(':cl', $lop);
        $stmt->bindParam(':le', $gv);
        $stmt->execute();
        header("Location: ../class.php");
        exit;
    }
} else {
    $em  = "o";
    $_SESSION['error'] = $em;
    header("Location: ../addclass.php");
    exit;
}
