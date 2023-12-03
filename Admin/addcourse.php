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
                $title = "Thêm môn/khóa học";
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
                                <form class="login" method="post" action="comp/themkhoa.php">
                                    <h3>THÊM MÔN/KHÓA HỌC</h3>
                                    <?php
                                    // $err_stmt = $_GET['error'];
                                    if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            $err_stmt = $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            if ($err_stmt == "cnn") {
                                                $err = "Mã và tên không được để trống";
                                            } else if ($err_stmt == "c") {
                                                $err = "Mã không được trống";
                                            } else if ($err_stmt == "n") {
                                                $err = "Tên không được để trống";
                                            } else {
                                                $err = "Đã có lỗi xảy ra";
                                            }
                                            // echo $err;
                                            ?>
                                            <?= $err ?>
                                        </div>
                                    <?php } ?>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="ma" 
                                        placeholder="" value="<?php
                                            if (isset($_SESSION['code'])) {
                                                echo $_SESSION['code'];
                                            }
                                        ?>">
                                        <label class="form-label">Mã môn/khóa <span style="color: red;">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="ten" 
                                        placeholder="" value="<?php
                                            if (isset($_SESSION['name'])) {
                                                echo $_SESSION['name'];
                                            }
                                        ?>">
                                        <label class="form-label">Tên môn/khóa <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </form>

                                <br /><br />

                            </div>
                            <?php
                            unset($_SESSION['code']); unset($_SESSION['name']);
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