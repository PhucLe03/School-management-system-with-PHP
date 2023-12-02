<?php
session_start();
if (isset($_SESSION['masinhvien']) && isset($_SESSION['tucach'])) {

    if ($_SESSION['tucach'] == 'SinhVien') {
        include "../controllers/includer.php";

        $masinhvien = $_SESSION['masinhvien'];

        $sinhvien = getInfoSV($masinhvien, $conn);
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
                $usrname = $title;
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
                    <h1>Bảng điểm</h1>

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Môn/Khóa học</th>
                                    <th scope="col">Lớp</th>
                                    <th scope="col">Điểm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($lophoc as $lop) {
                                    $tenlop = $lop['tenkhoahoc'] . " (" . $lop['makhoahoc'] . ")";
                                    $id_ = $lop['id_c'];
                                    $diem = getDiem($id_,$masinhvien,$conn);

                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i;
                                            $i++; ?>
                                        </th>
                                        <td>
                                            <?= $lop['tenkhoahoc']; ?>
                                        </td>
                                        <td>
                                            <?= $lop['malophoc'] ?>
                                        </td>
                                        <td>
                                            <!-- <?= $tengiangvien ?> -->
                                            <?php
                                            if ($diem!=0) {
                                                echo $diem['sodiem'];
                                            }
                                            else {
                                                echo "Chưa có điểm";
                                            }
                                            ?>
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