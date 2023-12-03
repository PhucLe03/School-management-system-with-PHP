<?php
session_start();

function checkSV($id_sv, $conn)
{
    $sql = "SELECT * FROM in4sinhvien
            WHERE tendangnhap=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_sv);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

if (
    isset($_POST['masv']) &&
    isset($_POST['ho']) &&
    isset($_POST['ten']) &&
    isset($_POST['tdn']) &&
    isset($_POST['sdt']) &&
    isset($_POST['ns']) &&
    isset($_POST['gt']) &&
    isset($_POST['mk']) && isset($_POST['mk1']) 
) {
    include "../../DB_connection.php";
    $masv = $_POST['masv'];
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $uname = $_POST['tdn'];
    $phone = $_POST['sdt'];
    $year = $_POST['ns'];
    $sex = $_POST['gt'];
    $pass = $_POST['mk'];
    $pass1 = $_POST['mk1'];

    $_SESSION['masv'] = $masv;
    $_SESSION['ho']= $ho; 
    $_SESSION['ten'] = $ten;
    $_SESSION['tdn'] = $uname;
    $_SESSION['sdt'] = $phone;
    $_SESSION['ns'] = $year;
    $_SESSION['gt'] = $sex;
    $_SESSION['mk'] = $pass;
    $_SESSION['mk1'] = $pass1;

    if (empty($masv) || empty($ho)    || empty($ten)
    || empty($uname) || empty($phone) || empty($sex)
    || empty($year)   || empty($pass)  || empty($pass1)) {
        $em  = "m";
        $_SESSION['error'] = $em;
        header("Location: ../addsv.php");
        exit;
    } else if ($pass!=$pass1) {
        $em  = "p";
        $_SESSION['error'] = $em;
        header("Location: ../addsv.php");
        exit;
    } else {
        // Check
        if (checkSV($masv ,$conn)==true) {
            $em  = "u";
            $_SESSION['error'] = $em;
            header("Location: ../addsv.php");
            exit;
        }
        // Thêm sv
        try {
            $mail = $uname."@hcmut.edu.vn";
            $realpass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO sinhvien (masinhvien,ho_tenlot,ten,tendangnhap,sdt,namsinh,gioitinh,matkhau,email)
                    VALUE (:masv,:ho,:ten,:tdn,:sdt,:ns,:gt,:mk,:ml);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':masv', $masv);
            $stmt->bindParam(':ho', $ho);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':tdn', $uname);
            $stmt->bindParam(':sdt', $phone);
            $stmt->bindParam(':ns', $year);
            $stmt->bindParam(':gt', $sex);
            $stmt->bindParam(':mk', $realpass);
            $stmt->bindParam(':ml', $mail);
            $stmt->execute();
    
    
            unset($_SESSION['masv']);
            unset($_SESSION['ho']);
            unset($_SESSION['ten']);
            unset($_SESSION['tdn']);
            unset($_SESSION['sdt']);
            unset($_SESSION['ns']);
            unset($_SESSION['gt']);
            unset($_SESSION['mk']);
            unset($_SESSION['mk1']);
    
            header("Location: ../sinhvien.php");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode()==23000) {
                $em = "u";
            } else {
                $em = "o";
            }
            $_SESSION['error'] = $em;
            header("Location: ../addsv.php");
            exit;
        }
        
    }
} else {
    $em  = "o";
    $_SESSION['error'] = $em;
    header("Location: ../addsv.php");
    exit;
}
