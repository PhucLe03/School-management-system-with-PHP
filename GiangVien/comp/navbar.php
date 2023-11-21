<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="../imgs/logo.png" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navLinks">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Tổng quan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lop.php">Danh sách lớp</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doimatkhau.php">Đổi mật khẩu</a>
        </li>

      </ul>
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link">
            <?= $title ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Đăng xuất</a>
        </li>
      </ul>
    </div>
  </div>
</nav>