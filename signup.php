<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>CloseApart</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Student’s online second home – participate in quizzes, communicate with teachers, complete your work online! Get comfortable with us">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/argon-design-system.min.css">
	<link rel="stylesheet" href="assets/css/argon-design-system-extras.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
</head>

<body>
	<!-- Navigation -->
	<?php include('includes/nav_transparent.php'); ?>
	<!-- Log in -->
	<section class="section section-shaped bg-primary section-md">
		<div class="container pt-2 pt-lg-6">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="card bg-secondary shadow border-0">
						<div class="card-header bg-white pb-4">
							<div class="text-muted text-center mb-3"><small>Sign up with</small></div>
							<div class="btn-wrapper text-center">
								<a href="#" class="btn btn-neutral btn-icon">
									<i class='bx bxl-google align-middle'></i>
									<span class="align-middle">Google</span>
								</a>
							</div>
						</div>
						<div class="card-body bg-secondary px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<small>Or sign up with credentials</small>
							</div>
							<form role="form">
								<div class="form-group">
									<div class="input-group input-group-alternative mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-user'></i></span>
										</div>
										<input class="form-control" placeholder="Name" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-envelope'></i></span>
										</div>
										<input class="form-control" placeholder="Email" type="email">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-lock-open-alt'></i></span>
										</div>
										<input class="form-control" placeholder="Password" type="password">
									</div>
								</div>
								<!-- <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div> -->
								<div class="row my-4">
									<div class="col-12">
										<div class="custom-control custom-control-alternative custom-checkbox">
											<input class="custom-control-input" id="customCheckRegister" type="checkbox">
											<label class="custom-control-label" for="customCheckRegister"><span>I agree with the <a href="#">Privacy Policy</a></span></label>
										</div>
									</div>
								</div>
								<div class="text-center">
									<a href="./studentlogin.php" class="btn btn-primary mt-4">Create account</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<?php include('includes/footer.php'); ?>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="./assets/js/argon-design-system.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src="./assets/js/main.js"></script>
</body>

</html>