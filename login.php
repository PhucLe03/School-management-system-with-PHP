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
                    <input type="text" class="form-control" name="uname" placeholder="">
                    <label class="form-label">Tên đăng nhập</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="pass" placeholder="">
                    <label class="form-label">Mật khẩu</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Đăng nhập với tư cách</label>
                    <select class="form-control" name="role">
                        <option value="1">Admin</option>
                        <option value="2">Giảng Viên</option>
                        <option value="3">Sinh Viên</option>
                        <option value="4">Con ma</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <a href="index.php" class="text-decoration-none">Về trang chủ</a>
            </form>

            <br /><br />
            <?php include "footer.php"; ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>