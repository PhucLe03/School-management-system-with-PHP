<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imgs/icon.ico">
</head>

<body class="body-login">
    <div class="black-fill"><br /> <br />
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" method="post" action="helper/process_login.php">

                <div class="text-center">
                    <img src="imgs/logo.png" width="100">
                </div>
                <h3>ĐĂNG NHẬP</h3>
                <?php 
                // $err_stmt = $_GET['error'];
                if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        $err_stmt = $_GET['error'];
                        if ($err_stmt=="unp") {
                            $err = "Tên đăng nhập và Mật khẩu không được để trống";
                        }
                        else if ($err_stmt=="u") {
                            $err = "Tên đăng nhập không được trống";
                        }
                        else if ($err_stmt=="p") {
                            $err = "Mật khẩu không được để trống";
                        }
                        else if ($err_stmt=="w") {
                            $err = "Tên đăng nhập hoặc mật khẩu sai";
                        }
                        else {
                            $err = "Đã có lỗi xảy ra";
                        }
                        // echo $err;
                        ?>
                        <?= $err ?>
                    </div>
                <?php } ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="uname" placeholder=""
                    value="<?php
                        if (isset($_SESSION['un'])) {
                            echo $_SESSION['un'];
                        }
                    ?>">
                    <label class="form-label">Tên đăng nhập <span style="color: red;">*</span></label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="pass" placeholder=""
                    value="<?php
                        if (isset($_SESSION['pw'])) {
                            echo $_SESSION['pw'];
                        }
                    ?>">
                    <label class="form-label">Mật khẩu <span style="color: red;">*</span></label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Đăng nhập với tư cách <span style="color: red;">*</span></label>
                    <select class="form-control" name="role">
                        <option value="SV">Sinh Viên</option>
                        <option value="GV">Giảng Viên</option>
                        <option value="AD">Quản lý</option>
                        <!-- <option value="EX">Con ma</option> -->
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <a href="index.php" class="text-decoration-none">Về trang chủ</a>
            </form>

            <br /><br />
            <?php
            unset($_SESSION['un']); unset($_SESSION['pw']);
            include "footer.php"; ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>