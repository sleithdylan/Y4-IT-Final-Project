<?php
// Requires config
require('../config/config.php');
// Creates and checks connection
require('../config/db.php');

// Starts session
session_start();

// If user is logged in
if (isset($_SESSION['staff_email']) && isset($_COOKIE['staff_email'])) {
	// Redirect to the staff dashboard
	header('Location: ./dashboard.php');
	exit();
}

// Message variables
$msg = '';
$msgClass = '';

// Checks for posted data
if (isset($_POST['register'])) {
	// Starts session
	session_start();

	// Gets form data
	$staffFullName = mysqli_real_escape_string($conn, $_POST['stafffullname']);
	$staffEmail = mysqli_real_escape_string($conn, $_POST['staffemail']);
	$staffEmail = strtolower($staffEmail); // Returns email in lowercase
	$staffEmail = filter_var($staffEmail, FILTER_SANITIZE_EMAIL); // Removes illegal characters
	$staffEmail = trim($staffEmail); // Removes whitespace
	$staffPassword = mysqli_real_escape_string($conn, $_POST['staffpassword']);

	// Hashed password
	$passwordHashed = password_hash($staffPassword, PASSWORD_DEFAULT);

	// SELECT Query
	$query = "SELECT * FROM staff WHERE staff_email = '$staffEmail'";

	// Gets result
	$result = mysqli_query($conn, $query);

	// Gets number of rows
	$numOfRows = mysqli_num_rows($result);

	if (mysqli_query($conn, $query) && isset($staffFullName) && isset($staffEmail) && isset($staffPassword) && $numOfRows != 1) {
		//* Passed
		// INSERT Query
		$regQuery = "INSERT INTO staff(staff_fullname, staff_email, staff_password) 
                  VALUES('$staffFullName', '$staffEmail', '$passwordHashed')";
		$regQueryClass = "INSERT INTO classes(class_name, staff_email) 
									VALUES('$staffFullName', '$staffEmail')";

		// Gets result
		$result = mysqli_query($conn, $regQuery);
		$result += mysqli_query($conn, $regQueryClass);
		$msg = '<strong>Success!</strong> You are now registered';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to the staff login after 1 second
		header('refresh:1; url=./login.php');
	}
	else {
		//! Failed
		// Returns error
		$msg = '<strong>Error!</strong> Email taken...';
		$msgClass = 'alert-danger alert-dismissible fade show my-4';
	}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>Sign up | CloseApart</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description"
		content="Student’s online second home – participate in quizzes, communicate with teachers, complete your work online! Get comfortable with us">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../assets/css/argon-design-system.min.css">
	<link rel="stylesheet" href="../assets/css/argon-design-system-extras.min.css">
</head>

<body>
	<!-- Navigation -->
	<?php include('../includes/navs/nav_transparent.php'); ?>
	<!-- Log in -->
	<section class="section section-shaped bg-primary section-md">
		<div class="container pt-2 pt-lg-6">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<?php if($msg != ""): ?>
					<div class="alert <?php echo $msgClass; ?> alert-dismissible fade show" role="alert"><?php echo $msg; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif; ?>
					<div class="card bg-secondary shadow border-0">
						<div class="card-body bg-secondary px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<small>Sign up with credentials</small>
							</div>
							<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="staffSignupForm" class="needs-validation">
								<div class="form-group">
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-user'></i></span>
										</div>
										<input type="text" class="form-control" id="stafffullname" name="stafffullname"
											placeholder="Full Name" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-envelope'></i></span>
										</div>
										<input type="email" class="form-control" id="staffemail" name="staffemail" placeholder="Email"
											required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-lock-open-alt'></i></span>
										</div>
										<input type="password" class="form-control" id="staffpassword" name="staffpassword"
											placeholder="Password" required>
									</div>
								</div>
								<!-- <div class="row my-4">
									<div class="col-12">
										<div class="custom-control custom-control-alternative custom-checkbox">
											<input class="custom-control-input" id="customCheckRegister" type="checkbox">
											<label class="custom-control-label" for="customCheckRegister"><span>I agree with the <a
														href="#">Privacy Policy</a></span></label>
										</div>
									</div>
								</div> -->
								<div class="text-center">
									<button type="submit" name="register" class="btn btn-primary my-4 btn-block text-capitalize">Create
										account</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-12 text-center">
							<a href="./login.php" class="text-white"><small>Login to account</small></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<?php include('../includes/footers/footer_user.php'); ?>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="../assets/js/argon-design-system.min.js"></script>
	<script src="../assets/js/main.js"></script>
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

		$("#staffSignupForm").validate({
			rules: {
				stafffullname: "required",
				staffemail: {
					required: true,
					email: true
				},
				staffpassword: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				stafffullname: "Please enter your full name",
				staffemail: {
					required: "Please enter your email",
					email: "Your email must be in the format of name@domain.com"
				},
				staffpassword: {
					required: "Please enter your password"
				}
			}
		});
	</script>
</body>

</html>