<?php

// Starts session
session_start();

// Include Google Client Library for PHP autoload file
require_once '../vendor/autoload.php';
// Requires config
require('../config/config.php');
// Creates and checks connection
require('../config/db.php');

// Puts session variable into $email
$email = $_SESSION['student_email'];

// Gets students data
function getStudentsData($studentId) {
	// Requires config
	require('../config/config.php');
	// Creates and checks connection
	require('../config/db.php');
	// Creates array
	$array = array();
	// SELECT query
	$query = mysqli_query($conn, "SELECT * FROM students WHERE student_id=" . $studentId);
	// Loops through array
	while ($row = mysqli_fetch_assoc($query)) {
		$array['student_id'] = $row['student_id'];
		$array['student_fullname'] = $row['student_fullname'];
		$array['student_email'] = $row['student_email'];
		$array['student_password'] = $row['student_password'];
		$array['student_avatar'] = $row['student_avatar'];
		$array['attendance'] = $row['attendance'];
		$array['attendance_explained'] = $row['attendance_explained'];
		$array['attendance_unexplained'] = $row['attendance_unexplained'];
	}
	return $array;
}

// Get student ID
function getId($email) {
	// Requires config
	require('../config/config.php');
	// Creates and checks connection
	require('../config/db.php');
	// SELECT query
	$query = mysqli_query($conn, "SELECT student_id FROM students WHERE student_email='" . $email . "'");
	while ($row = mysqli_fetch_assoc($query)) {
		return $row['student_id'];
	}
}

// If user is not logged in
if (!isset($_SESSION['student_email'])) {
	// Redirect to the student login with error message
	header('Location: ./login.php?err=' . urlencode('<strong>Error!</strong> You need to log in!'));
	exit();
}

// Gets user data from id
if (isset($_SESSION['student_email'])) {
	$studentData = getStudentsData(getId($_SESSION['student_email']));
}

// SELECT Query
$query = "SELECT * FROM announcements JOIN staff USING(staff_email) ORDER BY announcement_id ASC";

// Gets result
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
	<title>Announcements Overview | CloseApart</title>
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
	<link rel="stylesheet" href="../assets/css/argon.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />

</head>

<body>
	<!-- Side Navigation -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<div class="sidenav-header align-items-center">
				<a class="navbar-brand d-flex justify-content-center" href="../index.php">
					<img src="../assets/images/brand/closeapart-logo-primary.svg" class="mr-2 brand-logo"
						alt="closeapart logo">
					<span class="font-weight-bold text-primary">Close</span><span
						class="font-weight-light text-primary">Apart</span>
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" href="./dashboard.php">
								<i class='bx bx-bar-chart-alt'></i>
								<span class="nav-link-text">Overview</span>
							</a>
						</li>
					</ul>
					<hr class="my-3">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-game'></i>
								<span class="nav-link-text">Quizzes</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../quiz/maths/maths.php">Maths</a>
								<a class="dropdown-item" href="../quiz/english/english.php">English</a>
								<a class="dropdown-item" href="../quiz/history/history.php">History</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./announcements.php">
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
										<img src='../assets/images/avatars/<?php echo $studentData['student_avatar'] ?>' />
										<?php endif; ?>
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span
											class="mb-0 text-sm font-weight-bold"><?php echo $studentData['student_fullname'] . $_SESSION['givenName'] . ' ' . $_SESSION['familyName'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right ">
								<a href="./dashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="./settings.php?id=<?php echo $studentData['student_id'] . $_SESSION['id'] ?>"
									class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="./logout.php" class="dropdown-item">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Data -->
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
						<div class="card-header bg-transparent">
							<div class="row align-items-center">
								<div class="col d-flex justify-content-between align-items-center">
									<h3 class="mb-0">Announcements</h3>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<?php foreach($lists as $list) : ?>
									<div id="cardDiv" class="card my-4 border-bottom shadow-sm">
										<div id="cardPost" class="card-body">
											<div class="row">
												<div class="col">
													<h5 class="mr-3 text-muted font-weight-normal">By <?php echo $list['staff_fullname'] . ' | ' . $list['created_at'] ?></h5>
													<h3 class="mr-3"><?php echo $list['announcement_subject'] ?></h3>
													<h4 class="font-weight-normal"><?php echo $list['announcement_description'] ?></h4>
													</h5>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
	<script src="../assets/js/argon-design-system-extras.min.js"></script>
	<script src="../assets/js/main.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>