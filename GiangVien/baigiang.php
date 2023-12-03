<?php
session_start();
if (isset($_SESSION['magiangvien']) && isset($_SESSION['tucach']) && $_GET['id']) {

    if ($_SESSION['tucach'] == 'GiangVien') {
        include "../controllers/includer.php";

        $magiangvien = $_SESSION['magiangvien'];
        $id_baigiang = $_GET['id'];
        $giangvien = getGiangVienTheoId($magiangvien, $conn);

        $baigiang = getNoiDungBaiGiang($id_baigiang, $conn);
        if ($baigiang != 0) {
            $id_lophoc = $baigiang['id_lophoc'];
            $lophoc = getLopTheoId($id_lophoc, $conn);
            $khoahoc = 0;
            $truycap = gvKiemTraQuyenVaoLop($magiangvien, $id_lophoc, $conn);
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
                } else if ($baigiang == 0) {
                    $title = "Không tìm thấy bài giảng";
                } else {
                    $title .= " - " . $baigiang['tieude'];
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
                        if ($baigiang != 0) {
                        ?>
                            <h1><?= $baigiang['tieude'] ?></h1>
                            <a href="<?php echo gotoLop($id_lophoc) ?>">
                                <?= $real_title ?>
                            </a>
                            / <a style="color:darkslategrey;">
                                <?= $baigiang['tieude'] ?>
                            </a>
                            <!-- Bai Giang  -->
                            <br />
                            <br />
                            <br />
                            <hr />
                            <p>
                                <?= $baigiang['noidung'] ?>
                            </p>
                            <br />
                            <hr />

                            <a href="<?php echo suaBaiGiang($id_baigiang, $id_lophoc); ?>" class="btn btn-primary">Sửa</a>
                            <button class="btn btn-primary" style="background-color: red;">Xóa</button>

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
                        Không tìm thấy bài giảng!
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