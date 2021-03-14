<?php
// Starts session
session_start();

// Include Google Client Library for PHP autoload file
require_once '../../../vendor/autoload.php';
// Requires config
require('../../../config/config.php');
// Creates and checks connection
require('../../../config/db.php');

// Message variables
$msg = '';
$msgClass = '';

// Puts session variable into $email
$email = $_SESSION['staff_email'];

// Gets staff data
function getStaffData($staffId) {
	// Requires config
	require('../../../config/config.php');
	// Creates and checks connection
	require('../../../config/db.php');
	// Creates array
	$array = array();
	// SELECT query
	$query = mysqli_query($conn, "SELECT * FROM staff WHERE staff_id=" . $staffId);
	// Loops through array
	while ($row = mysqli_fetch_assoc($query)) {
		$array['staff_id'] = $row['staff_id'];
		$array['staff_fullname'] = $row['staff_fullname'];
		$array['staff_email'] = $row['staff_email'];
		$array['staff_password'] = $row['staff_password'];
		$array['staff_avatar'] = $row['staff_avatar'];
	}
	return $array;
}

// Get staff ID
function getId($email) {
	// Requires config
	require('../../../config/config.php');
	// Creates and checks connection
	require('../../../config/db.php');
	// SELECT query
	$query = mysqli_query($conn, "SELECT staff_id FROM staff WHERE staff_email='" . $email . "'");
	while ($row = mysqli_fetch_assoc($query)) {
		return $row['staff_id'];
	}
}

// Gets user data from id
if (isset($_SESSION['staff_email'])) {
	$staffData = getStaffData(getId($_SESSION['staff_email']));
}

// Checks for posted data
if (isset($_POST['profile'])) {
	// Gets form data
	$grade = mysqli_real_escape_string($conn, $_POST['grade']);
	$gpa = mysqli_real_escape_string($conn, $_POST['gpa']);
	$attendance = mysqli_real_escape_string($conn, $_POST['attendance']);

	// Gets ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// SELECT Query
	$query = "SELECT * FROM students JOIN subjects USING(student_email) ORDER BY student_id WHERE student_id = {$id}";

	// UPDATE Query
	$query = "UPDATE students JOIN subjects USING(student_email) SET 
      subject_grade = '$grade',
      subject_gpa = '$gpa', 
      subject_attendance = '$attendance'
  WHERE subject_name='Science' AND student_id = {$id}";

	// Checks required fields
	if (mysqli_query($conn, $query)) {
		//* Passed
		$msg = '<strong>Success!</strong> Grade, GPA & Attendance has been edited!';
		$msgClass = 'alert-success alert-dismissible fade show';
	}
	else {
		//! Failed
		// Returns error
		$msg = '<strong>Error!</strong> Please fill in all fields correctly';
		$msgClass = 'alert-danger alert-dismissible fade show';
	}

}

// If user is not logged in
if (!isset($_SESSION['staff_email']) && !isset($_SESSION['access_token'])) {
	// Redirect to the student login with error message
	header('Location: ./login.php?err=' . urlencode('<strong>Error!</strong> You need to log in!'));
	exit();
}

// Gets ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// SELECT Query
$query = "SELECT * FROM students JOIN subjects USING(student_email) WHERE subject_name='Science' AND student_id = {$id}";

// Gets result
$result = mysqli_query($conn, $query);

// Fetches data
$lists = mysqli_fetch_assoc($result);

// Free's result from memory
mysqli_free_result($result);

// Closes connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title><?php echo $lists['student_fullname'] . "'s" ?> Grade, GPA & Attendance | CloseApart</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description"
		content="Student’s online second home – participate in quizzes, communicate with teachers, complete your work online! Get comfortable with us">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="../../../assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../../../assets/images/favicon.ico" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../../../assets/css/argon.min.css">
</head>

<body>
	<!-- Side Navigation -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<div class="sidenav-header align-items-center">
				<a class="navbar-brand d-flex justify-content-center" href="../../../index.php">
					<img src="../../../assets/images/brand/closeapart-logo-primary.svg" class="mr-2 brand-logo" alt="closeapart logo">
					<span class="font-weight-bold text-primary">Close</span><span
						class="font-weight-light text-primary">Apart</span>
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../../dashboard.php">
								<i class='bx bx-bar-chart-alt'></i>
								<span class="nav-link-text">Overview</span>
							</a>
						</li>
					</ul>
					<hr class="my-3">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-book'></i>
								<span class="nav-link-text">Subjects</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../../subjects/english/english.php">English</a>
								<a class="dropdown-item" href="../../subjects/maths/maths.php">Maths</a>
								<a class="dropdown-item" href="../../subjects/history/history.php">History</a>
								<a class="dropdown-item" href="../../subjects/geography/geography.php">Geography</a>
								<a class="dropdown-item" href="../../subjects/science/science.php">Science</a>
								<a class="dropdown-item" href="../../subjects/gaeilge/gaeilge.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../announcements/announcements.php">
							<i class='bx bxs-megaphone'></i>
								<span class="nav-link-text">Announcements</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Dashboard -->
	<div class="main-content">
		<!-- Top Navigation -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav align-items-center ml-auto">
						<li class="nav-item d-xl-none">
							<!-- Hamburger Menu -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
								data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-bell'></i>
							</a>
							<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right  py-0 overflow-hidden">
								<div class="px-3 py-3">
									<h6 class="text-sm text-muted m-0">You have <strong class="text-primary">1</strong> notification.</h6>
								</div>
								<div class="list-group list-group-flush">
									<a href="#" class="list-group-item list-group-item-action">
										<div class="row align-items-center">
											<div class="col-auto">
												<img alt="Image placeholder" src="../../../assets/images/testimonials/john.jpg"
													class="avatar rounded-circle">
											</div>
											<div class="col ml--2">
												<div class="d-flex justify-content-between align-items-center">
													<div>
														<h4 class="mb-0 text-sm">John</h4>
													</div>
													<div class="text-right text-muted">
														<small>4 hrs ago</small>
													</div>
												</div>
												<p class="text-sm mb-0">I uploaded tonight's homework</p>
											</div>
										</div>
									</a>
								</div>
								<a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav align-items-center">
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<?php if($_SESSION['access_token'] == true): ?>
											<img src='<?php echo $_SESSION['picture']; ?>' />
										<?php else: ?>
											<img src='../../../assets/images/avatars/<?php echo $staffData['staff_avatar'] ?>' />
										<?php endif; ?>
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span class="mb-0 text-sm font-weight-bold"><?php echo $staffData['staff_fullname'] . $_SESSION['givenName'] . ' ' . $_SESSION['familyName'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right ">
								<a href="../../dashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="../../settings.php?id=<?php echo $staffData['staff_id'] . $_SESSION['id'] ?>" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="../../logout.php" class="dropdown-item">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container-fluid mt-4">
			<div class="row">
				<div class="col-xl-12">
					<?php if($msg != ""): ?>
					<div class="alert <?php echo $msgClass; ?> alert-dismissible fade show" role="alert"><?php echo $msg; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif; ?>
					<div class="card">
						<div class="card-header">
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0"><?php echo $lists['student_fullname'] . "'s" ?> Grade, GPA & Attendance </h3>
								</div>
							</div>
						</div>
						<div class="card-body">
							<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="subjectsettings"
								enctype="multipart/form-data">
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label class="form-control-label" for="grade">Science Grade</label>
												<input type="text" id="grade" name="grade" class="form-control"
													placeholder="Grade, e.g. 85" value="<?php echo $lists['subject_grade']; ?>"
													required>
											</div>
											<div class="form-group">
												<label class="form-control-label" for="gpa">Science GPA</label>
												<input type="text" class="form-control" id="gpa" name="gpa"
													placeholder="GPA, e.g. 4.5" value="<?php echo $lists['subject_gpa']; ?>"
													required>
											</div>
											<div class="form-group">
												<label class="form-control-label" for="attendance">Science Attendance</label>
												<input type="text" class="form-control" id="attendance" name="attendance"
													placeholder="Attendance, e.g. 100" value="<?php echo $lists['subject_attendance']; ?>"
													required>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<div class="d-flex">
									<button type="submit" name="profile" class="btn btn-primary flex-grow-1">Edit Profile</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
	<script src="../../../assets/js/argon-design-system-extras.min.js"></script>
	<script src="../../../assets/js/main.js"></script>
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

		$("#subjectsettings").validate({
			rules: {
				grade: {
					required: true,
					digits: "true",
					maxlength: 2
				},
				gpa: {
					required: true,
					maxlength: 3
				},
				attendance: {
					required: true,
					digits: "true",
					maxlength: 3
				}
			},
			messages: {
				grade: {
					required: "Please enter a grade",
					digits: "Please enter digits only",
					maxlength: "The grade can only be 3 characters long"
				},
				gpa: {
					required: "Please enter a GPA",
					digits: "Please enter digits only",
					maxlength: "The gpa can only be 3 characters long"
				},
				attendance: {
					required: "Please enter an attendance",
					digits: "Please enter digits only",
					maxlength: "The attendance can only be 3 digits long"
				}
			}
		});
	</script>
</body>

</html>