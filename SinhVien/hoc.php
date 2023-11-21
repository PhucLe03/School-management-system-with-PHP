<?php
session_start();
if (
    isset($_SESSION['masinhvien']) && isset($_SESSION['tucach'])
) {

    if ($_SESSION['tucach'] == 'SinhVien') {
        include "../DB_connection.php";
        include "../controllers/sinhvien_ctl.php";
        include "../controllers/giangvien_ctl.php";
        include "../controllers/lophoc_ctl.php";

        $masinhvien = $_SESSION['masinhvien'];

        $sinhvien = getSinhVienTheoId($masinhvien, $conn);
        $lophoc = getLopCuaSinhVien($masinhvien, $conn);
        // $gioitinh = "Nam";
        // if ($sinhvien['gioitinh'] == 0) {
        //     $gioitinh = "Nữ";
        // }
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?php
                $tensinhvien = $sinhvien['ho_tenlot'] . " " . $sinhvien['ten'];
                $title = "Sinh viên " . $tensinhvien;
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

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Lớp</th>
                                    <th scope="col">Giảng viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($lophoc as $lop) {
                                    $tenkhoa = getTenCuaKhoa($lop['makhoahoc'],$conn);
                                    $tenkhoa = $tenkhoa['tenkhoahoc'];
                                    $tenlop = $tenkhoa . " (" . $lop['makhoahoc'].")";
                                    $gv = getGiangVienCuaLop($lop['malophoc'],$lop['makhoahoc'],$conn);
                                    $giangvien = getGiangVienTheoId($gv['magiangvien'],$conn);
                                    $gGV_tmp = $giangvien['gioitinh'];
                                    if ($gGV_tmp==true) {
                                        $gGV = "Thầy ";
                                    }
                                    else {
                                        $gGV = "Cô ";
                                    }
                                    $tengiangvien = $gGV . $giangvien['ho_tenlot'] . " " . $giangvien['ten'];
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i; $i++; ?>
                                        </th>
                                        <td>
                                            <?= $tenlop; ?>
                                            <br/>
                                            <?= $lop['malophoc'] ?>
                                        </td>
                                        <td>
                                            <?= $tengiangvien ?>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-info .w-450 m-5" role="alert">
                        Không có lớp học!
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