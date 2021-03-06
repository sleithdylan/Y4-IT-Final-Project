<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>Contact us | CloseApart</title>
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

	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="./assets/css/argon-design-system.min.css">
	<link rel="stylesheet" href="./assets/css/argon-design-system-extras.min.css">
</head>

<body>
	<!-- Navigation -->
	<nav id="navbar-main" class="navbar navbar-expand-lg navbar-transparent navbar-light">
		<div class="container">
			<a class="navbar-brand" href="./index.php">
				<img src="./assets/images/brand/closeapart-logo-white.svg" class="mr-2 brand-logo">
				<span class="font-weight-bold text-white">Close</span><span class="font-weight-light text-white">Apart</span>
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
							<a class="dropdown-item" href="./student/login.php">As Student</a>
							<a class="dropdown-item" href="./staff/login.php">As Staff</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Sign up
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./student/signup.php">As Student</a>
							<a class="dropdown-item" href="./staff/signup.php">As Staff</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Contact Us Form -->
	<section class="section section-shaped bg-primary section-md">
		<div class="container pt-2 pt-lg-6">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card bg-secondary shadow border-0">
						<div class="card-body bg-secondary px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<h4>Contact Us</h4>
							</div>
							<form id="contact-form" method="POST" action="https://formspree.io/f/mpzogvjo">
								<h6 id="contact-form-status"></h6>
								<div class="form-group">
									<label for="name">Your Name</label>
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-user'></i></span>
										</div>
										<input type="text" class="form-control" id="name" name="name"
											placeholder="Full Name" required>
									</div>
								</div>
								<div class="form-group">
									<label for="_replyto">Your Email</label>
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-envelope'></i></span>
										</div>
										<input type="email" class="form-control" id="email" name="_replyto" placeholder="Email"
											required>
									</div>
								</div>
								<div class="form-group">
									<label for="subject">Subject</label>
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-message-square-detail'></i></span>
										</div>
										<input type="text" class="form-control" id="subject" name="subject"
											placeholder="Subject" required>
									</div>
								</div>
								<div class="form-group">
									<label for="message">Your Message</label>
									<div class="input-group input-group-alternative mb-2">
										<textarea class="form-control p-3" id="message" name="message"
											placeholder="Message..." cols="10" rows="5" required></textarea>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" id="contact-form-button" class="btn btn-primary my-4 btn-block text-capitalize">Send message</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<?php include('./includes/footers/footer_user.php'); ?>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="./assets/js/argon-design-system.min.js"></script>
	<script src="./assets/js/main.js"></script>
	<script>
		$.validator.setDefaults({
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});

		$("#contact-form").validate({
			rules: {
				name: "required",
				_replyto: {
					required: true,
					email: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			},
			messages: {
				name: "Please enter your full name",
				_replyto: {
					required: "Please enter your email",
					email: "Your email must be in the format of name@domain.com"
				},
				subject: {
					required: "Please enter a subject name"
				},
				message: {
					required: "Please enter your message"
				}
			}
		});
	</script>
	<script>
  window.addEventListener("DOMContentLoaded", function() {

    // get the form elements defined in your form HTML above
    
    var form = document.getElementById("contact-form");
    var button = document.getElementById("contact-form-button");
    var status = document.getElementById("contact-form-status");

    // Success and Error functions for after the form is submitted
    
    function success() {
      form.reset();
			status.innerHTML = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Message has been sent<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }

    function error() {
			status.innerHTML = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error!</strong> There was a problem<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }

    // handle the form submission event

    form.addEventListener("submit", function(ev) {
      ev.preventDefault();
      var data = new FormData(form);
      ajax(form.method, form.action, data, success, error);
    });
  });
  
  // helper function for sending an AJAX request

  function ajax(method, url, data, success, error) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.onreadystatechange = function() {
      if (xhr.readyState !== XMLHttpRequest.DONE) return;
      if (xhr.status === 200) {
        success(xhr.response, xhr.responseType);
      } else {
        error(xhr.status, xhr.response, xhr.responseType);
      }
    };
    xhr.send(data);
  }
</script>
</body>

</html>