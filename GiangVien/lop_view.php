<?php
session_start();
if (isset($_SESSION['magiangvien']) && isset($_SESSION['tucach']) && $_GET['id']) {

    if ($_SESSION['tucach'] == 'GiangVien') {
        include "../controllers/includer.php";

        $magiangvien = $_SESSION['magiangvien'];

        $giangvien = getGiangVienTheoId($magiangvien, $conn);
        $id_lophoc = $_GET['id'];
        $lophoc = getLopTheoId($id_lophoc, $conn);
        $khoahoc = 0;
        $truycap = gvKiemTraQuyenVaoLop($magiangvien, $id_lophoc, $conn);
        // echo $lophoc['malophoc'];
        // echo "\r\n";
        // echo $lophoc['makhoahoc'];
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?php
                $tengiangvien = $giangvien['ho_tenlot'] . " " . $giangvien['ten'];
                $usrname = "Giảng viên " . $tengiangvien;

                if ($lophoc != 0) {
                    $khoahoc = $lophoc['tenkhoahoc'];

                    $baigiang = getBaiGiangCuaLop($id_lophoc, $conn);
                    $id_gv = getGiangVienCuaLop($id_lophoc, $conn);
                    $giangvien = getGiangVienTheoId($id_gv['magiangvien'], $conn);
                    if ($giangvien['gioitinh'] = true) {
                        $gGV = "Thầy ";
                    } else {
                        $gGV = "Cô ";
                    }
                    $title = $lophoc['tenkhoahoc'] . " - " . $lophoc['malophoc'];

                    $real_title = $title;
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
                    ?>
                        <a href="<?php echo "./thembaigiang.php?lopid=$id_lophoc"; ?>">

                            <button class="btn btn-primary">Thêm bài giảng</button>
                        </a>
                        <button class="btn btn-primary">Thêm bài tập</button>
                        <button class="btn btn-primary">Thêm bài kiểm tra</button>
                        <a href="<?php echo "./danhsachsv.php?lopid=$id_lophoc"; ?>">
                            <button class="btn btn-primary">Xem danh sách sinh viên</button>
                        </a>

                        <?php
                        if ($baigiang != 0) {
                        ?>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Bài giảng</th>
                                            <th scope="col" colspan="3">Tiêu đề</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($baigiang as $bg) {
                                        ?>
                                            <tr>
                                                <th scope="row" class="col-2">
                                                    <?php echo $i;
                                                    $i++; ?>
                                                </th>
                                                <td scope="row">
                                                    <a href="<?php echo gotoBaiGiang($bg['id_l']) ?>">
                                                        <?= $bg['tieude'] ?>
                                                    </a>
                                                </td>
                                                <td scope="row" class="col-1">
                                                    <button class="btn btn-primary" style="background-color: dodgerblue;">Sửa</button>
                                                </td>
                                                <td scope="row" class="col-1">
                                                    <button class="btn btn-primary" style="background-color: red;">Xóa</button>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                $baitap = getBaiTapCuaLop($id_lophoc, $conn); // getBaiTap
                                if ($baitap != 0) {
                                ?>
                                    <!-- Bai Tap  -->
                                    <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Bài tập</th>
                                                <th scope="col" colspan="3">Tiêu đề</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($baitap as $bt) {
                                            ?>
                                                <tr>
                                                    <th scope="row" class="col-2">
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
                                <?php }
                                $kiemtra = getBaiKTCuaLop($id_lophoc, $conn); // getBaiTap
                                if ($kiemtra != 0) {
                                ?>

                                    <!-- Kiem tra  -->
                                    <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kiểm tra</th>
                                                <th scope="col" colspan="3">Tiêu đề</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($kiemtra as $kt) {
                                            ?>
                                                <tr>
                                                    <th scope="row" class="col-2">
                                                        <?php echo $i;
                                                        $i++; ?>
                                                    </th>
                                                    <td scope="row">
                                                        <a href="<?php echo gotoBaiKT($kt['id_t']) ?>">
                                                            <?= $kt['tieude'] ?>
                                                        </a>
                                                    </td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                <?php }
                            } else { ?>
                                <div class="alert alert-info" role="alert">
                                    Chưa có bài giảng.
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="alert alert-info" role="alert">
                                Lớp học này đang được giảng viên khác quản lý.
                            </div>
                        <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-info .w-450 m-5" role="alert">
                                Không tìm thấy lớp học!
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