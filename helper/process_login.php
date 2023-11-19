<?php 
session_start();

if (isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['role'])) {

	// include "../DB_connection.php";
	
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];

    $miss_uname = false;
    $miss_pass = false;
    $miss_role = false;

    if (empty($role)) {
        $em  = "o";
        header("Location: ../login.php?error=$em");
        exit;
    }
	if (empty($uname)) {
		$miss_uname = true;
    }
    if (empty($pass)) {
		$miss_pass = true;
    }

    if ($miss_uname==true && $miss_pass==true) {
        $em  = "unp";
        header("Location: ../login.php?error=$em");
        exit;
    }
    else if ($miss_uname==true) {
        $em  = "u";
        header("Location: ../login.php?error=$em");
        exit;
    }
    else if ($miss_pass==true) {
        $em  = "p";
        header("Location: ../login.php?error=$em");
        exit;
    }
    else {
        // Đăng nhập
        if ($uname=="Phuc"&&$pass=="123") {
            header("Location: ../SinhVien/index.php");
            exit;
        }
        else {
        	$em  = "Incorrect Username or Password";
		    header("Location: ../login.php?error=$em");
		    exit;
        }
	}


}else{
	header("Location: ../login.php");
	exit;
}