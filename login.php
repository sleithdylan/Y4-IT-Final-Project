<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>CloseApart</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="About CloseApart..">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	<nav id="navbar-main" class="navbar navbar-expand-lg navbar-transparent navbar-light">
		<div class="container">
			<a class="navbar-brand" href="./index.php">
				<span class="font-weight-bold">Close</span><span class="font-weight-light">Apart</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbarDropdown">
				<div class="navbar-collapse-header">
					<div class="row">
						<div class="col-6 collapse-brand">
							<a class="navbar-brand" href="./index.php">
								<span class="font-weight-bold">Close</span><span class="font-weight-light">Apart</span>
							</a>
						</div>
						<div class="col-6 collapse-close">
							<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="./index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./index.php#features">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./index.php#testimonials">Testimonials</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Log in
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">As Student</a>
							<a class="dropdown-item" href="#">As Parent</a>
							<a class="dropdown-item" href="#">As Staff</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Sign up
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">As Student</a>
							<a class="dropdown-item" href="#">As Parent</a>
							<a class="dropdown-item" href="#">As Staff</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Log in -->
	<section class="section section-shaped bg-primary section-md">
		<div class="container pt-lg-7">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="card bg-secondary shadow border-0">
						<div class="card-header bg-white pb-4">
							<div class="text-muted text-center mb-3"><small>Log in with</small></div>
							<div class="btn-wrapper text-center">
								<a href="#" class="btn btn-neutral btn-icon">
									<i class='bx bxl-google align-middle'></i>
									<span class="align-middle">Google</span>
								</a>
							</div>
						</div>
						<div class="card-body bg-secondary px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<small>Or log in with credentials</small>
							</div>
							<form role="form">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
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
								<div class="custom-control custom-control-alternative custom-checkbox">
									<input class="custom-control-input" id=" customCheckLogin" type="checkbox">
									<label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
								</div>
								<div class="text-center">
									<button type="button" class="btn btn-primary my-4 text-capitalize">Log in</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<a href="#" class="text-light"><small>Forgot password?</small></a>
						</div>
						<div class="col-6 text-right">
							<a href="#" class="text-light"><small>Create new account</small></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<footer>
		<nav class="bg-white navbar-light border-top">
			<div class="container py-5">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="d-flex flex-column">
							<a class="navbar-brand mb-5" href="./index.php">
								<span class="font-weight-bold">Close</span><span class="font-weight-light">Apart</span>
							</a>
						</div>
					</div>
					<div class="col-md col-sm-6">
						<ul class="navbar-nav mb-5">
							<li class="nav-item">
								<a class="nav-link active disabled pt-0" href="#">Product</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#use-cases">Use Cases</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#help-centre">Help Centre</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#status">Status</a>
							</li>
						</ul>
					</div>
					<div class="col-md col-sm-6">
						<ul class="navbar-nav mb-5">
							<li class="nav-item">
								<a class="nav-link active disabled pt-0" href="#">Company</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="./index.php#features">Features</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="./index.php#testimonials">Testimonials</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#sitemap">Sitemap</a>
							</li>
						</ul>
					</div>
					<div class="col-md col-sm-6">
						<ul class="navbar-nav mb-5">
							<li class="nav-item">
								<a class="nav-link active disabled pt-0" href="#">Legal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#terms">Terms & Conditions</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#privacy">Privacy Policy</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#disclaimer">Disclaimer</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="d-flex flex-column">
							<p class="text-dark">&copy; CloseApart</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="socials mb-3 d-flex justify-content-sm-start justify-content-md-between">
							<a class="text-dark h4" href="#">
								<i class='bx bxl-twitter'></i>
							</a>
							<a class="text-dark h4 mx-4" href="#">
								<i class='bx bxl-facebook-square'></i>
							</a>
							<a class="text-dark h4" href="#">
								<i class='bx bxl-instagram'></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</footer>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="./assets/js/argon-design-system.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src="./assets/js/main.js"></script>
</body>

</html>