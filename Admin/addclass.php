<?php
session_start();
if (isset($_SESSION['maadmin']) && isset($_SESSION['tucach'])) {

    if ($_SESSION['tucach'] == 'Admin') {
        include "../controllers/admin_ctl.php";

        $maadmin = $_SESSION['maadmin'];
        $admin = getInfoAD($maadmin, $conn);

        $allcourse = getTatCaKhoahoc($conn);
        $alllecturers = getTatCaGiangVien(($conn));
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
                $title = "Thêm lớp học";
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
                            <a href="class.php" class="text-decoration-none">
                                Quay lại
                            </a>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <form class="login" method="post" action="comp/themlop.php">
                                    <h3>THÊM LỚP HỌC</h3>
                                    <?php
                                    // $err_stmt = $_GET['error'];
                                    if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            $err_stmt = $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            if ($err_stmt == "m") {
                                                $err = "Các khung có dấu * không được để trống";
                                            } else if ($err_stmt == "e") {
                                                $err = "Lớp có cùng tên đã được tạo trước đó";
                                            } else {
                                                $err = "Đã có lỗi xảy ra";
                                            }
                                            // echo $err;
                                            ?>
                                            <?= $err ?>
                                        </div>
                                    <?php } ?>
                                    <div class="form-floating mb-3">
                                        <input type="text" list="courselist" class="form-control" name="khoa" 
                                        placeholder="" value="<?php
                                            if (isset($_SESSION['course'])) {
                                                echo $_SESSION['course'];
                                            }
                                        ?>">
                                        <datalist id="courselist">
                                            <?php
                                            foreach ($allcourse as $c) {
                                                ?>
                                                <option value="<?=$c['makhoahoc']?>"> <?=$c['tenkhoahoc']?> </option>
                                                
                                                <?php
                                            }
                                            ?>
                                        </datalist>
                                        <label class="form-label">Mã môn/khóa <span style="color: red;">*</span></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="lop" 
                                        placeholder="" value="<?php
                                            if (isset($_SESSION['class'])) {
                                                echo $_SESSION['class'];
                                            }
                                        ?>">
                                        <label class="form-label">Tên lớp <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" list="lecturerlist" class="form-control" name="gv" 
                                        placeholder="" value="<?php
                                            if (isset($_SESSION['lecturer'])) {
                                                echo $_SESSION['lecturer'];
                                            }
                                        ?>">
                                        <datalist id="lecturerlist">
                                            <?php
                                            foreach ($alllecturers as $c) {
                                                ?>
                                                <option value="<?=$c['magiangvien']?>"> <?=$c['ho_tenlot']." ".$c['ten']?> </option>
                                                
                                                <?php
                                            }
                                            ?>
                                        </datalist>
                                        <label class="form-label">Mã giảng viên phụ trách <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </form>

                                <br /><br />

                            </div>
                            <?php
                            unset($_SESSION['course']); unset($_SESSION['class']); unset($_SESSION['lecturer']);
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