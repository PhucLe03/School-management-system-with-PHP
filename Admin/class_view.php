<?php
session_start();
if (isset($_SESSION['maadmin']) && isset($_SESSION['tucach']) && $_GET['id']) {

    if ($_SESSION['tucach'] == 'Admin') {
        include "../controllers/admin_ctl.php";

        $maadmin = $_SESSION['maadmin'];
        $admin = getInfoAD($maadmin, $conn);
        $id_lophoc = $_GET['id'];
        $lophoc = getLopTheoId($id_lophoc, $conn);
        $khoahoc = 0;
        $truycap = 1;
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?php
                $tenadmin = $admin['ho_tenlot'] . " " . $admin['ten'];
                $usrname = "Admin " . $tenadmin;

                if ($lophoc != 0) {
                    $khoahoc = $lophoc['tenkhoahoc'];

                    $baigiang = getBaiGiangCuaLop($id_lophoc, $conn);
                    if ($lophoc['gtgv'] == true) {
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
                    <a href="class.php">
                        Quay lại
                    </a>
                    <br/>
                    <br/>
                    <?php
                    if ($truycap != false) {
                        $allSV = getAllSinhVienCuaLop($id_lophoc, $conn);
                        $allstudents = getSVKhacLop($id_lophoc,$conn);
                    ?>
                        <div class="row">
                            <div class="col card">
                                <br />
                                <div class="d-flex justify-content-center">
                                    <h3>Danh sách sinh viên</h3>
                                </div>
                                <?php
                                if ($allSV != 0) {
                                ?>
                                <table class="table table-sm table-bordered mt-3 n-table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Mã sinh viên</th>
                                            <th scope="col">Họ và tên</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($allSV as $sv) {
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

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                } else {?>
                                <div class="alert alert-info" role="alert">
                                    Lớp chưa có sinh viên.
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-4">
                                <form class="card" method="post" action="comp/dkmh.php">
                                    <br />
                                    <div class="d-flex justify-content-center">
                                        <h3>Thêm sinh viên</h3>
                                        <hr />
                                    </div>
                                    <div class="container">
                                        <?php
                                    // $err_stmt = $_GET['error'];
                                        if (isset($_SESSION['error'])) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php
                                                $err_stmt = $_SESSION['error'];
                                                unset($_SESSION['error']);
                                                if ($err_stmt == "m") {
                                                    $err = "Mã sinh viên không được để trống";
                                                } else if ($err_stmt == "a") {
                                                    $err = "Sinh viên đã có trong danh sách";
                                                } else {
                                                    $err = "Đã có lỗi xảy ra";
                                                }
                                                // echo $err;
                                                ?>
                                                <?= $err ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="form-floating mb-3">
                                            <input type="text" list="studentlist" class="form-control" name="mssv" placeholder=""
                                            value="<?php
                                                if (isset($_SESSION['mssv'])) {
                                                    echo $_SESSION['mssv'];
                                                    unset($_SESSION['mssv']);
                                                }
                                                ?>">
                                            <datalist id="studentlist">
                                                <?php
                                                foreach ($allstudents as $c) {
                                                ?>
                                                    <option value="<?= $c['masinhvien'] ?>"> <?= $c['ho_tenlot'] . " " . $c['ten'] ?> </option>

                                                <?php
                                                }
                                                ?>
                                            </datalist>
                                            <label class="form-label">Mã sinh viên <span style="color: red;">*</span></label>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                        <input style="visibility: hidden;" name="class" value="<?=$id_lophoc?>">
                                    </div>
                                </form>
                            </div>
                        </div>


                    <?php
                } ?>
                <?php } else { ?>
                    <div class="alert alert-info" role="alert">
                        Không thể truy cập.
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

    ?>