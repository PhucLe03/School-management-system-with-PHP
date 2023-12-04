<?php
session_start();
if (
    isset($_SESSION['masinhvien']) &&
    isset($_SESSION['tucach'])
) {

    if ($_SESSION['tucach'] == 'SinhVien') {


        if (
            isset($_POST['old_pass']) &&
            isset($_POST['new_pass'])   &&
            isset($_POST['c_new_pass'])
        ) {

            include '../../DB_connection.php';
            include "../../controllers/password_ctl.php";

            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $c_new_pass = $_POST['c_new_pass'];

            $sinhvien_id = $_SESSION['masinhvien'];

            if (empty($old_pass)) {
                $em  = "Vui lòng nhập mật khẩu cũ";
                $_SESSION['perror'] = $em;
                header("Location: ../doimatkhau.php");
                exit;
            } else if (empty($new_pass)) {
                $em  = "Vui lòng nhập mật khẩu mới";
                $_SESSION['perror'] = $em;
                header("Location: ../doimatkhau.php");
                exit;
            } else if (empty($c_new_pass)) {
                $em  = "Vui lòng xác nhận mật khẩu mới";
                $_SESSION['perror'] = $em;
                header("Location: ../doimatkhau.php");
                exit;
            } else if ($new_pass !== $c_new_pass) {
                $em  = "\"Mật khẩu mới\" và \"Xác nhận mật khẩu mới\" chưa khớp";
                $_SESSION['perror'] = $em;
                header("Location: ../doimatkhau.php");
                exit;
            } else if (!XacMinhMatKhauSinhVien($old_pass, $conn, $sinhvien_id)) {
                $em  = "Mật khẩu cũ chưa chính xác";
                $_SESSION['perror'] = $em;
                header("Location: ../doimatkhau.php");
                exit;
            } else {
                // hash password
                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

                $sql = "UPDATE sinhvien SET matkhau = ?
                        WHERE masinhvien=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_pass, $sinhvien_id]);
                $sm = "Mật khẩu đã được đổi thành công!";
                $_SESSION['psuccess'] = $sm;
                header("Location: ../doimatkhau.php?psuccess=$sm");
                exit;
            }
        } else {
            $em = "Đã có lỗi xảy ra";
            $_SESSION['perror'] = $em;
            header("Location: ../doimatkhau.php=$em");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}
