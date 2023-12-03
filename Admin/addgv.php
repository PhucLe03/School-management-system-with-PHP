<?php
session_start();
if (isset($_SESSION['maadmin']) && isset($_SESSION['tucach'])) {

    if ($_SESSION['tucach'] == 'Admin') {
        include "../controllers/admin_ctl.php";
        $maadmin = $_SESSION['maadmin'];

        $admin = getInfoAD($maadmin, $conn);
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
                $title = "Thêm tài khoản giảng viên";
                $real_title = $title;
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
            <div class="container mt-5">
                <h1><?= $real_title ?></h1>
                <div class=""><br /> <br />
                    <a href="course.php" class="text-decoration-none">
                        Quay lại
                    </a>
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <form class="login" method="post" action="comp/themgv.php">
                            <h3>THÊM TÀI KHOẢN GIẢNG VIÊN</h3>
                            <?php
                            // $err_stmt = $_GET['error'];
                            if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    $err_stmt = $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    if ($err_stmt == "m") {
                                        $err = "Các khung không được để trống";
                                    } else if ($err_stmt == "p") {
                                        $err = "Vui lòng xác nhận lại mật khẩu";
                                    } else if ($err_stmt == "c") {
                                        $err = "Mã giảng viên đã được sử dụng";
                                    } else if ($err_stmt == "u") {
                                        $err = "Tên đăng nhập đã được sử dụng";
                                    } else {
                                        $err = "Đã có lỗi xảy ra";
                                    }
                                    // echo $err;
                                    ?>
                                    <?= $err ?>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="magv" placeholder="" value="<?php
                                                                                                                    if (isset($_SESSION['magv'])) {
                                                                                                                        echo $_SESSION['magv'];
                                                                                                                    }
                                                                                                                    ?>">
                                        <label class="form-label">Mã GV <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                        
                                        <input type="text" class="form-control" name="tdn" placeholder="" value="<?php
                                                                                                                    if (isset($_SESSION['tdn'])) {
                                                                                                                        echo $_SESSION['tdn'];
                                                                                                                    }
                                                                                                                    ?>">
                                        <label class="form-label">Tên đăng nhập <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="gt">
                                            <option value="1" selected>Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                        <label class="form-label">Giới tính <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="ho" placeholder="" value="<?php
                                                                                                                if (isset($_SESSION['ho'])) {
                                                                                                                    echo $_SESSION['ho'];
                                                                                                                }
                                                                                                                ?>">
                                        <label class="form-label">Họ và tên lót <span style="color: red;">*</span></label>
                                    </div>
                                    
                                </div>
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="ten" placeholder="" value="<?php
                                                                                                                    if (isset($_SESSION['ten'])) {
                                                                                                                        echo $_SESSION['ten'];
                                                                                                                    }
                                                                                                                    ?>">
                                        <label class="form-label">Tên <span style="color: red;">*</span></label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="sdt" placeholder="" value="<?php
                                                                                                                    if (isset($_SESSION['sdt'])) {
                                                                                                                        echo $_SESSION['sdt'];
                                                                                                                    }
                                                                                                                    ?>">
                                        <label class="form-label">Số điện thoại <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="ns" placeholder="" value="<?php
                                                                                                                    if (isset($_SESSION['ns'])) {
                                                                                                                        echo $_SESSION['ns'];
                                                                                                                    }
                                                                                                                    ?>">
                                        <label class="form-label">Năm sinh <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="mk" placeholder="" value="<?php
                                                                                                        if (isset($_SESSION['mk'])) {
                                                                                                            echo $_SESSION['mk'];
                                                                                                        }
                                                                                                        ?>">
                                <label class="form-label">Mật khẩu <span style="color: red;">*</span></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="mk1" placeholder="" value="<?php
                                                                                                            if (isset($_SESSION['mk1'])) {
                                                                                                                echo $_SESSION['mk1'];
                                                                                                            }
                                                                                                            ?>">
                                <label class="form-label">Nhập lại mật khẩu <span style="color: red;">*</span></label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>

                        <br /><br />

                    </div>
                    <?php
                    unset($_SESSION['magv']);
                    unset($_SESSION['ho']);
                    unset($_SESSION['ten']);
                    unset($_SESSION['tdn']);
                    unset($_SESSION['sdt']);
                    unset($_SESSION['gt']);
                    unset($_SESSION['mk']);
                    unset($_SESSION['mk1']);
                    ?>
                </div>
            </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                //$(document).ready(function(){
                //  $("#navLinks li:nth-child(2) a").addClass('active');
                //});
            </script>
        </body>
        <?php
        unset($_SESSION['tieude']);
        unset($_SESSION['noidung']);
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