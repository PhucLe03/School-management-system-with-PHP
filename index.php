<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Welcome to BK TeachingLearning System -->
	<title>
		<?php
		$title = "BK Teaching-Learning System";
		include "header.php";
		?>
	</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="icon.ico">
</head>

<body class="body-home">
	<div class="black-fill"><br /> <br />
		<div class="container">
			<nav class="navbar navbar-expand-lg bg-light" id="homeNav">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img src="logo.png" width="40">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#about">Giới thiệu</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#contact">Liên hệ</a>
							</li>
						</ul>
						<ul class="navbar-nav me-right mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link" href="login.php">Đăng nhập</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<section class="welcome-text d-flex justify-content-center align-items-center flex-column">
				<img src="logo.png">
				<h4>BK Teaching-Learning System</h4>
				<p>Tiên phong - Khai phóng - Sáng tạo</p>
			</section>
			<section id="about" class="d-flex justify-content-center align-items-center flex-column">
				<div class="card mb-3 card-1">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="logo.png" class="img-fluid rounded-start">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Giới thiệu</h5>
								<p class="card-text">About BK</p>
								<p class="card-text"><small class="text-muted">HCMUT</small></p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php include "footer.php"; ?>

		</div>
	</div>
	<!-- Code here -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>