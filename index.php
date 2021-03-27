<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>CloseApart | Student’s online second home – participate in quizzes, communicate with teachers, complete your work online! Get comfortable with us</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description"
		content="Student’s online second home – participate in quizzes, communicate with teachers, complete your work online! Get comfortable with us">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

	<!-- PWA -->
  <link rel='manifest' href='./manifest.json'>
  <script>
    // Registering our Service worker
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('sw.js', {
        scope: './'
      })
    }
  </script>

	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/argon-design-system.min.css">
	<link rel="stylesheet" href="assets/css/argon-design-system-extras.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
	<div id="overlay"></div>
	<!-- Navigation -->
	<?php include('includes/navs/nav.php'); ?>
	<!-- Hero -->
	<div id="home" class="py-5">
		<div class="container">
			<div class="row d-flex flex-md-column flex-lg-row justify-content-center align-items-center py-5">
				<div class="col-md-8 col-lg-6">
					<h1 class="display-1 text-left stagger-brand">CloseApart</h1>
					<p class="text-left stagger-sub">Student’s online second home – participate in quizzes, communicate with teachers,
						complete your work online!</p>
					<div class="stagger-cta">
						<p>Sign up as a:</p>
						<a href="./student/signup.php" class="btn btn-primary text-capitalize px-5">Student</a>
						<a href="./staff/signup.php" class="btn btn-outline-primary text-capitalize px-5">Staff</a>
					</div>
				</div>
				<div class="col-md-8 col-lg-6">
					<img class="d-none d-sm-none d-md-block mt-md-5 mt-lg-0 stagger-image" style="height: 425px"
						src="./assets/images/illustrations/closeapart-work.png" alt="closeapart work">
				</div>
			</div>
		</div>
	</div>
	<!-- Who we are -->
	<div id="who-we-are" class="py-5">
		<div class="container">
			<div class="row d-flex flex-md-column-reverse flex-lg-row justify-content-center align-items-center py-5 drone-image" data-aos="fade-right">
				<img class="d-none d-sm-none d-md-none d-lg-block shadow" style="height: 500px; width: 425px"
						src="./assets/images/drone-school.png" alt="drone image of a school">
				<div class="col-md col-lg"></div>
				<div class="col-md col-lg-8 bg-white p-4 drone-text" data-aos="fade-left">
					<h6 class="text-left text-primary mt-3">Who we are</h6>
					<p class="text-left"><strong>CloseApart</strong> is a student portal driven by students. Our team’s goal is to
						help out students complete their work online when coming into school is simply not possible. With the
						difficult times of Covid-19 pandemic, we understand how important it is for the students not to miss out on
						any school work.</p>
					<p>As a team, we offer a space for the students to have a chance to communicate with their teachers by
						uploading their work online and vice versa. With CloseApart it has never been easier.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Features -->
	<div id="features" class="py-5">
		<div class="container">
			<div class="row">
				<h6 class="col-md text-left text-primary mt-5" data-aos="fade-up">Features</h6>
			</div>
			<div class="row">
				<h4 class="col-md-5 text-left" data-aos="fade-up" data-aos-duration="1000">Here's what you can expect</h4>
			</div>
		</div>
		<div class="container">
			<div class="row py-5">
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-danger shadow rounded-circle" data-aos="zoom-in-up">
						<i class='bx bxs-dashboard'></i>
					</div>
					<div class="pt-4">
						<h6 data-aos="fade-up" data-aos-duration="1000">Portal</h6>
						<p data-aos="fade-up" data-aos-duration="1000">Get comfortable with us. Customise your profile</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle" data-aos="zoom-in-up">
						<i class='bx bx-stats'></i>
					</div>
					<div class="pt-4">
						<h6 data-aos="fade-up" data-aos-duration="1000">Communicate</h6>
						<p data-aos="fade-up" data-aos-duration="1000">Share your thoughts. Upload informations for everyone</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-info shadow rounded-circle" data-aos="zoom-in-up">
						<i class='bx bxs-game'></i>
					</div>
					<div class="pt-4">
						<h6 data-aos="fade-up" data-aos-duration="1000">Quizzes</h6>
						<p data-aos="fade-up" data-aos-duration="1000">Take part in online quizzes and earn rewards</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 my-4 d-flex flex-column">
					<div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle" data-aos="zoom-in-up">
						<i class='bx bxs-cloud-upload'></i>
					</div>
					<div class="pt-4">
						<h6 data-aos="fade-up" data-aos-duration="1000">Upload media</h6>
						<p data-aos="fade-up" data-aos-duration="1000">Upload your work, share it with your teacher or class</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonials -->
	<div id="testimonials" class="py-5">
		<div class="container">
			<div class="row">
				<h6 class="col-md text-left text-sm-center text-primary mt-5" data-aos="fade-up">Testimonials</h6>
			</div>
			<div class="row">
				<h4 class="col-md text-left text-sm-center" data-aos="fade-up">What do you think of us?<br />Let us know!</h4>
			</div>
		</div>
		<div class="container-fluid" data-aos="fade-up">
			<div class="row py-5 owl-carousel">
				<div class="col-lg-12 col-md-12 col-sm-12 my-4">
					<div class="card">
						<div class="card-body shadow-sm py-5">
							<div class="icon icon-lg text-primary">
								<i class='bx bxs-quote-alt-left'></i>
							</div>
							<p class="card-text">My students absolutely love it here! It is so easy for me to communicate with them on
								a daily basis</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/testimonials/sarah.jpg"
									alt="picture of sarah">
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
							<p class="card-text">My son enjoys his new way of working. <br> This whole online thing was a step in the right
								direction!</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/testimonials/david.jpg"
									alt="picture of david">
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
							<p class="card-text">CloseApart comes in clutch. It solved so many problems due to the global pandemic. My
								class and I love it!</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/testimonials/john.jpg"
									alt="picture of john">
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
							<p class="card-text">This is the best idea ever! It takes so much pressure off my shoulders and ensures my
								kids are still being educated</p>
							<div class="d-flex align-items-center">
								<img class="rounded-circle" style="width: 17.5%;" src="./assets/images/testimonials/rebecca.jpg"
									alt="picture of rebecca">
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
				<h6 class="col-md text-left text-primary mt-5" data-aos="fade-up">Got any questions?</h6>
			</div>
			<div class="row">
				<h4 class="col-md text-left" data-aos="fade-up" data-aos-duration="1000">Contact us directly or visit the help centre</h4>
				<div class="col-md-7 d-flex justify-content-sm-start justify-content-md-end align-items-center" data-aos="fade-up" data-aos-duration="1000">
					<a href="./contact.php" class="btn btn-outline-primary text-capitalize px-4">Contact Us</a>
					<a href="#help-centre" class="btn btn-outline-primary text-capitalize px-4">Help Centre</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<?php include('includes/footers/footer_main.php'); ?>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="./assets/js/argon-design-system.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
	<script src="./assets/js/main.js"></script>
	<script>
		// Create GSAP Instance
		var tl = gsap.timeline({ defaults: { duration: 1 } });

		// GSAP
		tl.to('#overlay', { opacity: 0, display: 'none' }, '-=.1') // Fade Down
			.from('nav', { y: -50, opacity: 0 }, '-=.3') // Fade Down
			.from('.stagger-brand', { y: 50, opacity: 0, stagger: 0.7 }, '-=.3') // Fade Up
			.from('.stagger-sub', { y: 50, opacity: 0, stagger: 0.7 }, '-=.3') // Fade Up
			.from('.stagger-cta', { y: 50, opacity: 0, stagger: 0.7 }, '-=.3') // Fade Up
			.from('.stagger-image', { scaleX: 0.8, scaleY: 0.8, opacity: 0 }, '-=1'); // Zoom In with Delay
	</script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		// Carousel
		$(document).ready(function () {
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
		
		// AOS
		AOS.init({
		  easing: 'ease-in-out',
		  once: true,
		  duration: 1000,
			offset: 190
		});
	</script>
</body>

</html>