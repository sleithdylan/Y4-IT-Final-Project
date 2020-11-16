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
	<nav id="navbar-main" class="navbar navbar-expand-lg bg-white navbar-light sticky-top">
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
							<a class="dropdown-item" href="./login.php">As Student</a>
							<a class="dropdown-item" href="./login.php">As Staff</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Sign up
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./signup.php">As Student</a>
							<a class="dropdown-item" href="./signup.php">As Staff</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Hero -->
	<div id="home" class="py-5">
		<div class="container">
			<div class="row d-flex flex-md-column flex-lg-row justify-content-center align-items-center py-5">
				<div class="col-md-8 col-lg-5">
					<h1 class="display-1 text-left">CloseApart</h1>
					<p class="text-left">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer congue neque eu consectetur congue.</p>
					<button type="button" class="btn btn-primary text-capitalize px-5">Sign Up</button>
				</div>
				<div class="col-md-8 col-lg-6">
					<img class="d-none d-sm-none d-md-block mt-4" style="height: 425px" src="./assets/images/boy-on-computer.png" alt="boy on computer">
				</div>
			</div>
		</div>
	</div>
	<!-- Features -->
	<div id="features" class="py-5">
		<div class="container">
			<div class="row">
				<h6 class="col-md text-left text-primary mt-5">Features</h6>
			</div>
			<div class="row">
				<h4 class="col-md-5 text-left">Vivamus eget est quis urna fermentum ornare.</h4>
			</div>
		</div>
		<div class="container">
			<div class="row py-5">
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-danger shadow rounded-circle">
						<i class='bx bxs-dashboard'></i>
					</div>
					<div class="pt-4">
						<h6>Feature</h6>
						<p>Cras sodales malesuada turpis, et cursus ipsum accumsan vel.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
						<i class='bx bx-stats'></i>
					</div>
					<div class="pt-4">
						<h6>Feature</h6>
						<p>Cras sodales malesuada turpis, et cursus ipsum accumsan vel.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-info shadow rounded-circle">
						<i class='bx bxs-game'></i>
					</div>
					<div class="pt-4">
						<h6>Feature</h6>
						<p>Cras sodales malesuada turpis, et cursus ipsum accumsan vel.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
						<i class='bx bxs-cloud-upload'></i>
					</div>
					<div class="pt-4">
						<h6>Feature</h6>
						<p>Cras sodales malesuada turpis, et cursus ipsum accumsan vel.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonials -->
	<div id="testimonials" class="py-5">
		<div class="container">
			<div class="row">
				<h6 class="col-md text-center text-primary mt-5">Testimonials</h6>
			</div>
			<div class="row">
				<h4 class="col-md text-center">Proin aliquet, mauris eu tempor <br /> hendrerit, lorem ligul.</h4>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row py-5 owl-carousel">
				<div class="col-lg-12 col-md-12 col-sm-12 my-4">
					<div class="card">
						<div class="card-body shadow-sm py-5">
							<div class="icon icon-lg text-primary">
								<i class='bx bxs-quote-alt-left'></i>
							</div>
							<p class="card-text">Aenean fringilla velit libero, vitae viverra dui aliquet vel. Pellentesque pulvinar elementum ullamcorper.</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/faces/sarah.jpg" alt="picture of sarah">
								<div class="d-flex flex-column ml-3 mt-3">
									<h6>Sarah</h6>
									<p>Teacher</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 my-4">
					<div class="card">
						<div class="card-body shadow-sm py-5">
							<div class="icon icon-lg text-primary">
								<i class='bx bxs-quote-alt-left'></i>
							</div>
							<p class="card-text">Aenean fringilla velit libero, vitae viverra dui aliquet vel. Pellentesque pulvinar elementum ullamcorper.</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/faces/david.jpg" alt="picture of david">
								<div class="d-flex flex-column ml-3 mt-3">
									<h6>David</h6>
									<p>Father</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 my-4">
					<div class="card">
						<div class="card-body shadow-sm py-5">
							<div class="icon icon-lg text-primary">
								<i class='bx bxs-quote-alt-left'></i>
							</div>
							<p class="card-text">Aenean fringilla velit libero, vitae viverra dui aliquet vel. Pellentesque pulvinar elementum ullamcorper.</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/faces/john.jpg" alt="picture of john">
								<div class="d-flex flex-column ml-3 mt-3">
									<h6>John</h6>
									<p>Teacher</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 my-4">
					<div class="card">
						<div class="card-body shadow-sm py-5">
							<div class="icon icon-lg text-primary">
								<i class='bx bxs-quote-alt-left'></i>
							</div>
							<p class="card-text">Aenean fringilla velit libero, vitae viverra dui aliquet vel. Pellentesque pulvinar elementum ullamcorper.</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/faces/rebecca.jpg" alt="picture of rebecca">
								<div class="d-flex flex-column ml-3 mt-3">
									<h6>Rebecca</h6>
									<p>Mother</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- CTA -->
	<div id="cta" class="pb-5 mb-5">
		<div class="container">
			<div class="row">
				<h4 class="col-md text-left text-primary mt-5">Ready to get started?</h4>
			</div>
			<div class="row">
				<h4 class="col-md text-left">Get in touch or create an account.</h4>
				<div class="col-md-7 d-flex justify-content-sm-start justify-content-md-end align-items-center">
					<button type="button" class="btn btn-primary text-capitalize px-4 mr-4">Sign Up</button>
					<button type="button" class="btn btn-secondary text-capitalize px-4">Contact Us</button>
				</div>
			</div>
		</div>
	</div>
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
	<script>
		// Carousel
		$(document).ready(function() {
			$('.owl-carousel').owlCarousel({
				loop: true,
				responsiveClass: true,
				autoplay: true,
				smartSpeed: 500,
				responsive: {
					0: {
						items: 1,
						dots: true,
						loop: true,
					},
					600: {
						items: 2,
						dots: false,
						loop: true,
					},
					1000: {
						items: 4,
						dots: true,
						loop: true,
					},
				},
			});
		});
	</script>
</body>

</html>