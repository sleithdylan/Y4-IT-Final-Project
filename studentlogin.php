<?php
// Requires Config
require('config/config.php');
// Creates and Checks Connection
require('config/db.php');

// Alert/Message Variables
$msg = '';
$msgClass = '';

// Checks for posted data
if (isset($_POST['login'])) {
	// Starts session
	session_start();

	// Gets form data
	$studentEmail = mysqli_real_escape_string($conn, $_POST['student-email']);
	$studentPassword = mysqli_real_escape_string($conn, $_POST['student-password']);

	// Puts variable into session variable
	$_SESSION['student_email'] = $studentEmail;

	// SELECT Query
	$query = "SELECT * FROM students WHERE student_email = '$studentEmail' && BINARY student_password = '$studentPassword'";
	$hash = "SELECT student_password FROM students WHERE student_email = '$studentEmail'";

	// Gets Result
	$result = mysqli_query($conn, $query);
	$passwordHashed = mysqli_query($conn, $hash);

	// Returns all hashed passwords in an array
	$lists = mysqli_fetch_array($passwordHashed, MYSQLI_NUM);

	// Gets number of rows
	$numOfRows = mysqli_num_rows($result);

	if (mysqli_query($conn, $query) && isset($studentEmail) && isset($studentPassword) && $numOfRows == 1 || password_verify($studentPassword, $lists[0])) {
		// Sets Cookie for 30 Days and then it will expire
		setcookie('student_email', $studentEmail, time() + 2592000);
		// Passed
		$msg = '<strong>Success!</strong> You have logged in';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to studentdashboard.php after 1 second
		header('refresh:1;url=studentdashboard.php');
	}
	else {
		// Failed
		// Returns error
		$msg = '<strong>Error!</strong> Something went wrong..';
		$msgClass = 'alert-danger alert-dismissible fade show my-4';
	}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>Log in | CloseApart</title>
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
					<?php if($msg != ""): ?>
					<div class="alert <?php echo $msgClass; ?> alert-dismissible fade show" role="alert"><?php echo $msg; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif; ?>
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
							<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-envelope'></i></span>
										</div>
										<input type="email" class="form-control" id="student-email" name="student-email" placeholder="Email"
											required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-lock-open-alt'></i></span>
										</div>
										<input type="password" class="form-control" id="student-password" name="student-password"
											placeholder="Password" required>
									</div>
								</div>
								<!-- <div class="custom-control custom-control-alternative custom-checkbox">
									<input class="custom-control-input" id=" customCheckLogin" type="checkbox">
									<label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
								</div> -->
								<div class="text-center">
									<button type="submit" name="login" class="btn btn-primary my-4 text-capitalize">Log in</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<a href="#" class="text-white"><small>Forgot password?</small></a>
						</div>
						<div class="col-6 text-right">
							<a href="./studentsignup.php" class="text-white"><small>Create new account</small></a>
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