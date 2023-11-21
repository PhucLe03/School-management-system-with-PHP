<?php
session_start();
if (isset($_SESSION['masinhvien']) && isset($_SESSION['tucach']) && $_GET['id']) {

    if ($_SESSION['tucach'] == 'SinhVien') {
        include "../controllers/includer.php";

        $masinhvien = $_SESSION['masinhvien'];
        $sinhvien = getSinhVienTheoId($masinhvien, $conn);
        $id_lophoc = $_GET['id'];
        $lophoc = getLopTheoId($id_lophoc, $conn);
        $khoahoc = 0;
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?php
                $tensinhvien = $sinhvien['ho_tenlot'] . " " . $sinhvien['ten'];
                $usrname = "Sinh viên " . $tensinhvien;
                
                if ($lophoc != 0) {
                    $khoahoc = getTenCuaKhoa($lophoc['makhoahoc'], $conn);
                    $tenkhoahoc = $khoahoc['tenkhoahoc'];

                    $baigiang = getBaiGiangCuaLop($lophoc['malophoc'], $lophoc['makhoahoc'], $conn);
                    $id_gv = getGiangVienCuaLop($lophoc['malophoc'], $lophoc['makhoahoc'], $conn);
                    $giangvien = getGiangVienTheoId($id_gv['magiangvien'], $conn);
                    if ($giangvien['gioitinh'] = true) {
                        $gGV = "Thầy ";
                    } else {
                        $gGV = "Cô ";
                    }
                    $tengiangvien = $gGV . $giangvien['ho_tenlot'] . " " . $giangvien['ten'];
                    $title = $tenkhoahoc . " - " . $lophoc['malophoc'];

                    $real_title = $title . " - " . $tengiangvien;
                } else {
                    $title = "Không tìm thấy lớp";
                }
                include "../header.php";
                ?>
            </title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../imgs/icon.ico">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>
            <?php
            include "comp/navbar.php";
            ?>
            <?php
            if ($khoahoc != 0) {
            ?>
                <div class="container mt-5">
                    <h1><?= $real_title ?></h1>


                <?php } else { ?>
                    <div class="alert alert-info .w-450 m-5" role="alert">
                        Không tìm thấy lớp!
                    </div>
                <?php } ?>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    //$(document).ready(function(){
                    //  $("#navLinks li:nth-child(2) a").addClass('active');
                    //});
                </script>
        </body>

        </html>
<?php

    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}

?>