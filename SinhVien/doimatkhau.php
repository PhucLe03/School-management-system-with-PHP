<?php
session_start();
if (
    isset($_SESSION['masinhvien']) && isset($_SESSION['tucach'])
) {

    if ($_SESSION['tucach'] == 'SinhVien') {
        include "../controllers/includer.php";

        $masinhvien = $_SESSION['masinhvien'];

        $sinhvien = getInfoSV($masinhvien, $conn);
        $gioitinh = "Nam";
        if ($sinhvien['gioitinh'] == 0) {
            $gioitinh = "Nữ";
        }
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
            if ($sinhvien != 0) {
            ?>
                <div class="container mt-5">
                    <h1>Đổi mật khẩu tài khoản sinh viên</h1>
                    <div class="row">
                        <div class="col-4" style="width: 18rem;">
                            <div class="card container">
                                <div class="justify-content-center">
                                    <!-- <img src="../img/student-<?= $student['gender'] ?>.png" class="card-img-top" alt="..."> -->
                                    <img src="../imgs/logo.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">@<?= $sinhvien['tendangnhap'] ?></h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><?= $tensinhvien ?></li>
                                            <li class="list-group-item"><?= $sinhvien['masinhvien'] ?></li>
                                            <li class="list-group-item"><?= $sinhvien['namsinh'] ?></li>
                                            <li class="list-group-item"><?= $gioitinh ?></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <form method="post" class="shadow p-3 my-5 form-w" action="comp/svpass.php" id="change_password">
                                    <div class="d-flex justify-content-center">
                                        <br />
                                        <h3>Đổi mật khẩu</h3>
                                        <br />
                                        <br />
                                    </div>
                                    <?php if (isset($_SESSION['perror'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['perror']; unset($_SESSION['perror']); ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['psuccess'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $_SESSION['psuccess']; unset($_SESSION['psuccess']); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="old_pass" placeholder="">
                                        <label class="form-label">Mật khẩu cũ <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="new_pass" id="passInput" placeholder="">
                                        <label class="form-label">Mật khẩu mới <span style="color: red;">*</span></label>

                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="c_new_pass" id="passInput2" placeholder="">
                                        <label class="form-label">Xác nhận mật khẩu mới <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Xác nhận thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            <?php
            } else {
                header("Location: student.php");
                exit;
            }
            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                //$(document).ready(function(){
                //     $("#navLinks li:nth-child(1) a").addClass('active');
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