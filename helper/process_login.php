<?php
session_start();

if (
    isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['role'])
) {
    include "../DB_connection.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $_SESSION['un'] = $uname;
    $_SESSION['pw'] = $pass;
    
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

    if ($miss_uname == true && $miss_pass == true) {
        $em  = "unp";
        header("Location: ../login.php?error=$em");
        exit;
    } else if ($miss_uname == true) {
        $em  = "u";
        header("Location: ../login.php?error=$em");
        exit;
    } else if ($miss_pass == true) {
        $em  = "p";
        header("Location: ../login.php?error=$em");
        exit;
    } else {
        // Đăng nhập
        $sql = "";
        $tucach = "";
        if ($role=="AD") {
            $sql = "SELECT * FROM admin 
                    WHERE tendangnhap = ?";
            $tucach = "Admin";
        } else if ($role=="GV") {
            $sql = "SELECT * FROM login_gv 
                    WHERE tendangnhap = ?";
            $tucach = "GiangVien";
        } else if ($role=="SV") {
            $sql = "SELECT * FROM login_sv 
                    WHERE tendangnhap = ?";
            $tucach = "SinhVien";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $username = $user['tendangnhap'];
            $password = $user['matkhau'];
            if ($username === $uname) {
                if (password_verify($pass, $password)) {
                    $_SESSION['tucach'] = $tucach;
                    if ($tucach=="Admin") {
                        $id = $user['maadmin'];
                        $_SESSION['maadmin'] = $id;
                        header("Location: ../Admin/index.php");
                        exit;
                    } else if ($tucach=="GiangVien") {
                        $id = $user['magiangvien'];
                        $_SESSION['magiangvien'] = $id;
                        header("Location: ../GiangVien/index.php");
                        exit;
                    } else if ($tucach=="SinhVien") {
                        $id = $user['masinhvien'];
                        $_SESSION['masinhvien'] = $id;
                        header("Location: ../SinhVien/index.php");
                        exit;
                    }
                } else {
                    $em  = "w";
                    header("Location: ../login.php?error=$em");
                    exit;
                }
            } else {
                $em  = "w";
                header("Location: ../login.php?error=$em");
                exit;
            }
        } else {
            $em  = "w";
            header("Location: ../login.php?error=$em");
            exit;
        }
    }
} else {
    $em  = "o";
    header("Location: ../login.php?error=$em");
    exit;
}
