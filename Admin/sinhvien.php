<?php
session_start();
if (isset($_SESSION['maadmin']) && isset($_SESSION['tucach'])) {

    if ($_SESSION['tucach'] == 'Admin') {
        include "../controllers/admin_ctl.php";

        $maadmin = $_SESSION['maadmin'];

        $admin = getInfoAD($maadmin, $conn);
        $gioitinh = "Nam";
        if ($admin['gioitinh'] == 0) {
            $gioitinh = "Nữ";
        }
        // $lophoc = getAllLop()
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

                $title = "Quản lý sinh viên";
                $real_title = $title;
                include "../header.php";
                $sinhvien = getTatCaSinhVien($conn);
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
            <div class="container mt-5">
                <h1><?= $real_title ?></h1>
                <a class="btn btn-primary" href="addsv.php">Thêm tài khoản sinh viên</a>

                <?php
                if ($sinhvien != 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã SV</th>
                                    <th scope="col">Tên sinh viên</th>
                                    <th scope="col">Tên đăng nhập</th>
                                    <th scope="col">Năm sinh</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($sinhvien as $s) { 
                                    if ($s['gioitinh'] == true) {
                                        $gSV = "Nam";
                                    } else {
                                        $gSV = "Nữ";
                                    }
                                    $sv = $s['ho_tenlot']." ".$s['ten'];
                                    ?>
                                    <tr>
                                        <th scope="row" class="col">
                                            <?php echo $i;
                                            $i++; ?>
                                        </th>
                                        <td scope="row" class="col-1"><?= $s['masinhvien'] ?></td>
                                        <td scope="row" class="col-4"><?= $sv ?></td>
                                        <td scope="row" class="col-1"><?= $s['tendangnhap'] ?></td>
                                        <td scope="row" class="col-1"><?= $s['namsinh'] ?></td>
                                        <td scope="row" class="col"><?= $gSV ?></td>
                                        <td scope="row" class="col-2"><?= $s['sdt'] ?></td>
                                        <td scope="row" class="col-3"><?= $s['email'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                <?php } ?>

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