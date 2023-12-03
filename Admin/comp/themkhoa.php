<?php
session_start();

if (
    isset($_POST['ma']) &&
    isset($_POST['ten'])
) {
    include "../../DB_connection.php";
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    
    $_SESSION['code'] = $ma;
    $_SESSION['name'] = $ten;
    
    $miss_ma = false;
    $miss_ten = false;

    if (empty($ma)) {
        $miss_ma = true;
    }
    if (empty($ten)) {
        $miss_ten = true;
    }

    if ($miss_ma == true && $miss_ten == true) {
        $em  = "cnn"; $_SESSION['error'] = $em;
        header("Location: ../addcourse.php");
        exit;
    } else if ($miss_ma == true) {
        $em  = "c"; $_SESSION['error'] = $em;
        header("Location: ../addcourse.php");
        exit;
    } else if ($miss_ten == true) {
        $em  = "n"; $_SESSION['error'] = $em;
        header("Location: ../addcourse.php");
        exit;
    } else {
        // Thêm khóa
        unset($_SESSION['code']); unset($_SESSION['name']);
        $sql = "INSERT INTO khoahoc (makhoahoc,tenkhoahoc)
                VALUE (:tt,:ct);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tt', $ma);
        $stmt->bindParam(':ct', $ten);
        $stmt->execute();
        header("Location: ../course.php");
        exit;
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    header("Location: ../addcourse.php");
    exit;
}
