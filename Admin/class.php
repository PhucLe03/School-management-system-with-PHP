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

                $title = "Quản lý lớp học";
                $real_title = $title;
                include "../header.php";
                $lophoc = getTatCaLop($conn);
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
                <a class="btn btn-primary" href="addclass.php">Thêm lớp học</a>

                <?php
                if ($lophoc != 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã môn/khóa</th>
                                    <th scope="col">Tên môn/khóa</th>
                                    <th scope="col">Tên lớp</th>
                                    <th scope="col">Giảng viên phụ trách</th>
                                    <th scope="col">Sĩ số</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($lophoc as $lop) { 
                                    if ($lop['gtgv'] == true) {
                                        $gGV = "Thầy ";
                                    } else {
                                        $gGV = "Cô ";
                                    }
                                    $gv = $gGV.$lop['ho_gv']." ".$lop['ten_gv'];
                                    ?>
                                    <tr>
                                        <th scope="row" class="col">
                                            <?php echo $i;
                                            $i++; ?>
                                        </th>
                                        <td scope="row" class="col-2"><?= $lop['makhoahoc'] ?></td>
                                        <td scope="row" class="col-3"><?= $lop['tenkhoahoc'] ?></td>
                                        <td scope="row"><?= $lop['malophoc'] ?></td>
                                        <td scope="row"><?= $gv ?></td>
                                        <td scope="row"><?= $lop['count_sv'] ?></td>
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