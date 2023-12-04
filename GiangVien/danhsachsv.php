<?php
session_start();
if (isset($_SESSION['magiangvien']) && isset($_SESSION['tucach']) && $_GET['lopid']) {

    if ($_SESSION['tucach'] == 'GiangVien') {
        include "../controllers/includer.php";

        $magiangvien = $_SESSION['magiangvien'];
        $id_lophoc = $_GET['lopid'];
        $giangvien = getGiangVienTheoId($magiangvien, $conn);

        $truycap = gvKiemTraQuyenVaoLop($magiangvien, $id_lophoc, $conn);
        $danhsach = getAllSinhVienCuaLop($id_lophoc, $conn);
        $lophoc = getLopTheoId($id_lophoc, $conn);
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
                    $title = "Chưa có sinh viên";
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
            if ($lophoc != 0) {
            ?>
                <div class="container mt-5">
                    <?php
                    if ($truycap != false) {
                        ?>
                        <h1>Danh sách sinh viên</h1>
                        <a href="<?php echo gotoLop($id_lophoc) ?>">
                            <?= $real_title ?>
                        </a>
                        / <a style="color:darkslategrey;">
                            Danh sách sinh viên
                        </a>
                        <br/> <br/>
                        <?php
                        if ($danhsach != 0) {
                        ?>
                            <div class="row">
                                <div class="col-9">
                                    <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã sinh viên</th>
                                                <th scope="col">Họ và tên</th>
                                                <th scope="col" colspan="2">Điểm</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($danhsach as $sv) {
                                                $tensv = $sv['ho_tenlot'] . " " . $sv['ten'];
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
                                                        <?= $tensv ?>
                                                    </td>
                                                    <?php
                                                        $tensv = $sv['ho_tenlot'] . " " . $sv['ten'];
                                                        $mssv = $sv['masinhvien'];
                                                        if (is_null($sv['sodiem'])) {
                                                            ?>
                                                        <td scope="row"> Chưa chấm điểm </td>
                                                        <td scope="row"> <a href="<?php echo gotoNhapDiem($id_lophoc,$mssv); ?>" class="btn btn-primary">Nhập</a> </td>
                                                        <?php
                                                            // echo "Chưa chấm điểm";
                                                        } else {
                                                            
                                                            ?>
                                                        
                                                        <td scope="row"> <?= $sv['sodiem'] ?> </td>
                                                        <td scope="row"> <a href="<?php echo gotoNhapDiem($id_lophoc,$mssv); ?>" class="btn btn-primary">Sửa</a> </td>
                                                        <?php
                                                            // echo $sv['sodiem'];
                                                        }
                                                        ?>
                                                        <!-- <button class="btn btn-primary">Nhập</button> -->

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-3">
                                    <form id="score-form" class="score-form-hide">
                                        <?php
                                        if (isset($_SESSION['diem'])) {
                                            echo "Chỉnh sửa ";
                                        } else {
                                            echo "Nhập ";
                                        }
                                        ?>điểm cho sinh viên<br/>
                                        <?php
                                        if (isset($_SESSION['svduocchon'])) {
                                            echo $_SESSION['svduocchon'];
                                        }
                                        else {
                                            echo "Error!!!";
                                        }
                                        ?>
                                        <div class="form-floating mb-3">
                                            <input type="number" max="10" min="0" class="form-control" name="score" placeholder="" 
                                            value="<?php
                                                if (isset($_SESSION['diem'])) {
                                                    echo $_SESSION['diem'];
                                                }
                                                ?>">
                                            <label class="form-label">Điểm <span style="color: red;">*</span></label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Nhập</button>
                                        <a onclick="hideForm()" class="text-decoration-none" style="color: red; cursor: pointer;">Hủy</a>
                                    </form>

                                </div>
                            </div>
                            <!-- <button onclick="showForm()">Show</button> -->
                            <!-- <button onclick="hideForm()">Hide</button> -->

                        <?php
                        unset($_SESSION['svduocchon']); unset($_SESSION['diem']);
                    
                    } else { ?>
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