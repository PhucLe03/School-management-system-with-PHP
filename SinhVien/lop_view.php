<?php
session_start();
if (isset($_SESSION['masinhvien']) && isset($_SESSION['tucach']) && $_GET['id']) {

    if ($_SESSION['tucach'] == 'SinhVien') {
        include "../controllers/includer.php";

        $masinhvien = $_SESSION['masinhvien'];
        $sinhvien = getInfoSV($masinhvien, $conn);
        $id_lophoc = $_GET['id'];
        $lophoc = getLopTheoId($id_lophoc, $conn);
        $khoahoc = 0;
        $truycap = svKiemTraQuyenVaoLop($masinhvien, $id_lophoc, $conn);
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
                    $khoahoc = $lophoc['tenkhoahoc'];

                    $baigiang = getBaiGiangCuaLop($id_lophoc, $conn);
                    if ($lophoc['gtgv'] = true) {
                        $gGV = "Thầy ";
                    } else {
                        $gGV = "Cô ";
                    }
                    $tengiangvien = $gGV . $lophoc['ho_gv'] . " " . $lophoc['ten_gv'];
                    $title = $lophoc['tenkhoahoc'] . " - " . $lophoc['malophoc'];

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
                    <?php
                    if ($truycap != false) {
                        if ($baigiang != 0) {
                    ?>
                            <!-- Bai Giang  -->
                            <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Bài giảng</th>
                                        <th scope="col">Tiêu đề</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($baigiang as $bg) {
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $i;
                                                $i++; ?>
                                            </th>
                                            <td scope="row">
                                                <a href="<?php echo gotoBaiGiang($bg['id_l']) ?>">
                                                    <?= $bg['tieude'] ?>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            $baitap = getBaiTapCuaLop($id_lophoc,$conn); // getBaiTap
                            if ($baitap != 0) {
                            ?>
                            <!-- Bai Tap  -->
                            <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Bài tập</th>
                                        <th scope="col">Tiêu đề</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($baitap as $bt) {
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $i;
                                                $i++; ?>
                                            </th>
                                            <td scope="row">
                                                <a href="<?php echo gotoBaiTap($bt['id_e']) ?>">
                                                    <?= $bt['tieude'] ?>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="alert alert-info" role="alert">
                                Chưa có bài giảng.
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="alert alert-info" role="alert">
                            Bạn chưa ghi danh vào lớp học này.
                        </div>
                    <?php } ?>
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