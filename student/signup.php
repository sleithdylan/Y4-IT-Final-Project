<?php

// Include Google Client Library for PHP autoload file
require_once '../vendor/autoload.php';
// Requires config
require('../config/config.php');
// Creates and checks connection
require('../config/db.php');

// Starts session
session_start();

// If user is logged in
if (isset($_SESSION['student_email']) && isset($_COOKIE['student_email'])) {
	// Redirect to the student dashboard
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
	$studentFullName = mysqli_real_escape_string($conn, $_POST['studentfullname']);
	$studentEmail = mysqli_real_escape_string($conn, $_POST['studentemail']);
	$studentEmail = strtolower($studentEmail); // Returns email in lowercase
	$studentEmail = filter_var($studentEmail, FILTER_SANITIZE_EMAIL); // Removes illegal characters
	$studentEmail = trim($studentEmail); // Removes whitespace
	$studentPassword = mysqli_real_escape_string($conn, $_POST['studentpassword']);
	$studentClass = mysqli_real_escape_string($conn, $_POST['studentclass']);

	// Hashed password
	$passwordHashed = password_hash($studentPassword, PASSWORD_DEFAULT);

	// SELECT Query
	$query = "SELECT * FROM students WHERE student_email = '$studentEmail'";

	// Gets result
	$result = mysqli_query($conn, $query);

	// Gets number of rows
	$numOfRows = mysqli_num_rows($result);

	if (mysqli_query($conn, $query) && isset($studentFullName) && isset($studentEmail) && isset($studentPassword) && isset($studentClass) && $numOfRows != 1) {
		//* Passed
		// INSERT Query
		$regQuery = "INSERT INTO students(student_fullname, student_email, student_password, class_id) 
                  VALUES('$studentFullName', '$studentEmail', '$passwordHashed', '$studentClass')";
		$regQuerySubjects = "INSERT INTO subjects(subject_id, subject_name, subject_grade, subject_gpa, subject_attendance, student_email) VALUES
													(1, 'English', 0, '0', 0, '$studentEmail'),
													(2, 'Maths', 0, '0', 0, '$studentEmail'),
													(3, 'History', 0, '0', 0, '$studentEmail'),
													(4, 'Geography', 0, '0', 0, '$studentEmail'),
													(5, 'Science', 0, '0', 0, '$studentEmail'),
													(6, 'Gaeilge', 0, '0', 0, '$studentEmail')";
													
		// Gets result
		$result = mysqli_query($conn, $regQuery);
		$result += mysqli_query($conn, $regQuerySubjects);
		$msg = '<strong>Success!</strong> You are now registered';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to the student login after 1 second
		header('refresh:1; url=./login.php');
	}
	else {
		//! Failed
		// Returns error
		$msg = '<strong>Error!</strong> This email is already in use';
		$msgClass = 'alert-danger alert-dismissible fade show my-4';
	}

}

// SELECT Query
$query = "SELECT * FROM classes";

// Gets Result
$result = mysqli_query($conn, $query);

// Fetch Data
$lists = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Frees result from memory
mysqli_free_result($result);

// Closes connection
mysqli_close($conn);

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

	<!-- PWA -->
  <link rel='manifest' href='../manifest.json'>
  <script>
    // Registering our Service worker
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('../sw.js', {
        scope: './'
      })
    }
  </script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-5271QT8X93"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-5271QT8X93');
	</script>

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
		<div class="container pt-6">
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
							<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="studentSignupForm">
								<div class="form-group">
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-user'></i></span>
										</div>
										<input type="text" class="form-control" id="studentfullname" name="studentfullname"
											placeholder="Full Name" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-envelope'></i></span>
										</div>
										<input type="email" class="form-control" id="studentemail" name="studentemail" placeholder="Email"
											required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-lock-open-alt'></i></span>
										</div>
										<input id="password-field" type="password" class="form-control" id="studentpassword" name="studentpassword"
											placeholder="Password" required>
									</div>
									<span toggle="#password-field" class="bx bx-hide field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class='bx bxs-chalkboard'></i></span>
										</div>
										<select class="form-control" id="studentclass" name="studentclass" required>
			                <option value="">Choose Class</option>
											<?php foreach($lists as $list) : ?>
			                <option value="<?php echo $list['class_id']?>"><?php echo $list['class_name'] . "'s Class"?></option>
											<?php endforeach; ?>
			              </select>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" name="register" class="btn btn-primary my-4 btn-block text-capitalize">Create account</button>
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

		$("#studentSignupForm").validate({
			rules: {
				studentfullname: "required",
				studentemail: {
					required: true,
					email: true
				},
				studentpassword: {
					required: true,
					minlength: 6
				},
				studentclass: {
					required: true
				}
			},
			messages: {
				studentfullname: "Please enter your full name",
				studentemail: {
					required: "Please enter your email",
					email: "Your email must be in the format of name@domain.com"
				},
				studentpassword: {
					required: "Please enter your password"
				},
				studentclass: {
					required: "Please select your class"
				}
			}
		});
	</script>
</body>

</html>