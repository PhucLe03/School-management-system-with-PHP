<?php
session_start();
if (isset($_SESSION['magiangvien']) && isset($_SESSION['tucach']) && $_GET['lopid']) {

    if ($_SESSION['tucach'] == 'GiangVien') {
        include "../controllers/includer.php";

        $magiangvien = $_SESSION['magiangvien'];

        $giangvien = getGiangVienTheoId($magiangvien, $conn);
        $id_lophoc = $_GET['lopid'];
        $lophoc = getLopTheoId($id_lophoc, $conn);
        $id_baitap = $_GET['id'];
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

                    $baitap = getNoiDungBaiTap($id_baitap, $conn);
                    $tieude = $baitap['tieude']; $noidung = $baitap['noidung'];
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
                        <div class=""><br /> <br />
                            <a href="./lop_view.php?id=<?=$id_lophoc?>" class="text-decoration-none">
                                Quay lại
                            </a>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <form class="login" method="post" action="comp/xoabaitap.php">
                                    <h3>XÓA BÀI TẬP?</h3>
                                    <?php
                                    // $err_stmt = $_GET['error'];
                                    if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            // $err_stmt = $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            echo "Đã có lỗi xảy ra";
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" 
                                        placeholder="" value="<?= $tieude ?>" disabled>
                                        <label class="form-label">Tiêu đề <span style="color: red;">*</span></label>
                                    </div>

                                    <!-- <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="pass" placeholder="">
                                    </div> -->
                                    <div class=" mb-3">
                                        <label class="form-label">Nội dung: <span style="color: red;">*</span></label>
                                        <textarea class="form-control" rows="4" 
                                        placeholder="" disabled><?= $noidung ?></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary" style="background-color: red;">Xóa</button>
                                    </div>
                                    <input name="lopid" style="visibility: hidden;" value="<?=$id_lophoc?>">
                                    <input name="idbt" style="visibility: hidden;" value="<?=$id_baitap?>">
                                </form>

                                <br /><br />

                            </div>
                        </div>
                    <?php
                        unset($_SESSION['tieude']); unset($_SESSION['noidung']);
                        } else { ?>
                        <div class="alert alert-info" role="alert">
                            <!-- <?= $gGV ?> không dạy lớp học này. -->
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
        <?php
        unset($_SESSION['tieude']); unset($_SESSION['noidung']);
        ?>

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