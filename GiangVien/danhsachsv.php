<?php
session_start();
if (isset($_SESSION['magiangvien']) && isset($_SESSION['tucach']) && $_GET['lopid']) {

    if ($_SESSION['tucach'] == 'GiangVien') {
        include "../controllers/includer.php";

        $magiangvien = $_SESSION['magiangvien'];
        $id_lophoc = $_GET['lopid'];
        $giangvien = getGiangVienTheoId($magiangvien, $conn);

        $truycap = gvKiemTraQuyenVaoLop($magiangvien, $id_lophoc, $conn);
        $danhsach = getSinhVienCuaLop($id_lophoc, $conn);
        if ($danhsach != 0) {
            $lophoc = getLopTheoId($id_lophoc, $conn);
            $khoahoc = 0;
        } else {
            $lophoc = 0;
            $khoahoc = 0;
        }
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
                    $khoahoc = getTenCuaKhoa($lophoc['makhoahoc'], $conn);
                    $tenkhoahoc = $khoahoc['tenkhoahoc'];
                    $title = $tenkhoahoc . " - " . $lophoc['malophoc'];

                    $real_title = $title;
                } else {
                    $title = "Không tìm thấy lớp";
                }
                if ($truycap != true) {
                    $title = "Không thể truy cập vào lớp";
                } else if ($danhsach == 0) {
                    $title = "Không tìm thấy bài giảng";
                } else {
                    $title .= " - Danh sách sinh viên";
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
                    <?php
                    if ($truycap != false) {
                    ?>
                        <?php
                        if ($danhsach != 0) {
                        ?>
                            <h1>Danh sách sinh viên</h1>
                            <a href="<?php echo gotoLop($id_lophoc) ?>">
                                <?= $real_title ?>
                            </a>
                            / <a style="color:darkslategrey;">
                                Danh sách sinh viên
                            </a>
                            <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã sinh viên</th>
                                                <th scope="col">Họ và tên</th>
                                                <th scope="col">Điểm</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($danhsach as $sv) {
                                            ?>
                                                <tr>
                                                    <th scope="row" class="col-2">
                                                        <?php echo $i;
                                                        $i++; ?>
                                                    </th>
                                                    <td scope="row">
                                                        <?= $sv['masinhvien'] ?>
                                                    </td>
                                                    <td scope="row">
                                                        <?= $sv['ho_tenlot']." ".$sv['ten'] ?>
                                                        <!-- <a href="<?php echo gotoBaiTap($bt['id_e']) ?>">
                                                        </a> -->
                                                    </td>
                                                    <td scope="row">
                                                        Chưa có điểm
                                                    </td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                        <?php } else { ?>
                            <div class="alert alert-info" role="alert">
                                Chưa có sinh viên.
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="alert alert-info" role="alert">
                        Lớp học này đang được giảng viên khác quản lý.
                        </div>
                    <?php } ?>
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