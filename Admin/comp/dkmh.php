<?php
session_start();

function checkSVTrongLop($id_lophoc,$mssv,$conn) {
    $sql = "SELECT * FROM lop_rec
            WHERE id_lophoc=:lop AND masinhvien=:sv;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lop',$id_lophoc);
    $stmt->bindParam(':sv',$mssv);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

if (
    isset($_POST['mssv']) &&
    isset($_POST['class'])
) {
    include "../../DB_connection.php";
    $mssv = $_POST['mssv'];
    $lop = $_POST['class'];
    
    $_SESSION['mssv'] = $mssv;

    if (empty($mssv)) {
        $em  = "m"; $_SESSION['error'] = $em;
        header("Location: ../class_view.php?id=$lop");
        exit;
    } else {
        // Check Var
        if (checkSVTrongLop($lop,$mssv,$conn)==true) {
            $em  = "a"; $_SESSION['error'] = $em;
            header("Location: ../class_view.php?id=$lop");
            exit;
        }
        
        // Thêm sv vào lớp
        try {
            unset($_SESSION['mssv']);
            $sql = "INSERT INTO lop_rec (id_lophoc,masinhvien)
                    VALUE (:cl,:st);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cl', $lop);
            $stmt->bindParam(':st', $mssv);
            $stmt->execute();
            header("Location: ../class_view.php?id=$lop");
            exit;
        } catch (PDOException $e) {
            $em  = "o"; $_SESSION['error'] = $em;
            header("Location: ../class_view.php?id=$lop");
            exit;
        }
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../class_view.php?id=$lop");
    exit;
}
