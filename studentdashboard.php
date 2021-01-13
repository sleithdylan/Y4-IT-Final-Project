<?php
// Starts session
session_start();

// Puts session variable into $email
$email = $_SESSION['student_email'];

// Get students data
function getStudentsData($studentId) {
	// Requires Config
	require('config/config.php');
	// Creates and Checks Connection
	require('config/db.php');
	$array = array();
	$query = mysqli_query($conn, "SELECT * FROM students WHERE student_id=" . $studentId);
	while ($row = mysqli_fetch_assoc($query)) {
		$array['student_id'] = $row['student_id'];
		$array['student_fullname'] = $row['student_fullname'];
		$array['student_email'] = $row['student_email'];
		$array['student_password'] = $row['student_password'];
		$array['student_avatar'] = $row['student_avatar'];
	}
	return $array;
}

// Get student ID
function getId($email) {
	// Requires Config
	require('config/config.php');
	// Creates and Checks Connection
	require('config/db.php');
	$query = mysqli_query($conn, "SELECT student_id FROM students WHERE student_email='" . $email . "'");
	while ($row = mysqli_fetch_assoc($query)) {
		return $row['student_id'];
	}
}

?>

<?php if (!isset($_SESSION['student_email'])) {
	// Redirects to studentlogin.php
	header('Location: studentlogin.php');
	exit();
}
?>

<?php 
// Gets user data from id
if (isset($_SESSION['student_email'])) {
	$studentData = getStudentsData(getId($_SESSION['student_email']));
}
?>

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
	<link rel="stylesheet" href="assets/css/argon.min.css">
</head>

<body>
	<!-- Side Navigation -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<div class="sidenav-header align-items-center">
				<a class="navbar-brand d-flex justify-content-center" href="./index.php">
					<img src="assets/images/closeapart-logo-primary.svg" class="mr-2 brand-logo">
					<span class="font-weight-bold text-primary">Close</span><span class="font-weight-light text-primary">Apart</span>
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" href="./studentdashboard.php">
								<i class='bx bx-bar-chart-alt'></i>
								<span class="nav-link-text">Overview</span>
							</a>
						</li>
					</ul>
					<hr class="my-3">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class='bx bxs-game'></i>
								<span class="nav-link-text">Quizzes</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="./quiz/maths/maths.php">Maths</a>
								<a class="dropdown-item" href="./quiz/english/english.php">English</a>
								<a class="dropdown-item" href="./quiz/history/history.php">History</a>
							</div>
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
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
												<img alt="Image placeholder" src="./assets/images/faces/john.jpg" class="avatar rounded-circle">
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
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<img src='./assets/images/faces/<?php echo $studentData['student_avatar'] ?>' />
									</span>
									<div class="media-body  ml-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold"><?php echo $studentData['student_fullname'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<a href="./studentdashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="./studentsettings.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="./studentlogin.php" class="dropdown-item">
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
					<div class="card">
						<div class="card-header bg-transparent">
							<div class="row align-items-center">
								<div class="col">
									<h5 class="h3 mb-0">
										Your Grade Point Average
									</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<!-- Bar Chart -->
							<div class="chart">
								<canvas id="bar-chart" width="800" height="450"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Data -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-8">
					<div class="card">
						<div class="card-header bg-transparent">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="mb-0">Your Subjects</h3>
								</div>
							</div>
						</div>
						<div class="card-body">
							<!-- Table of Subjects -->
							<div class="table-responsive">
								<table class="table align-items-center table-flush">
									<thead class="thead-light">
										<tr>
											<th scope="col">Subject</th>
											<th scope="col">Average Grade</th>
											<th scope="col">Attendance</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">
												English
											</th>
											<td>
												70%
											</td>
											<td>
												95%
											</td>
										</tr>
										<tr>
											<th scope="row">
												Maths
											</th>
											<td>
												65%
											</td>
											<td>
												90%
											</td>
										</tr>
										<tr>
											<th scope="row">
												History
											</th>
											<td>
												80%
											</td>
											<td>
												95%
											</td>
										</tr>
										<tr>
											<th scope="row">
												Geography
											</th>
											<td>
												75%
											</td>
											<td>
												90%
											</td>
										</tr>
										<tr>
											<th scope="row">
												Science
											</th>
											<td>
												65%
											</td>
											<td>
												85%
											</td>
										</tr>
										<tr>
											<th scope="row">
												Gaeilge
											</th>
											<td>
												65%
											</td>
											<td>
												85%
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="card">
						<div class="card-header bg-transparent">
							<div class="row align-items-center">
								<div class="col">
									<h5 class="h3 mb-0">Your Attendance</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<!-- Pie Chart -->
							<div class="chart">
								<canvas id="pie-chart" class="chart-canvas"></canvas>
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
	<script src="./assets/js/argon-design-system-extras.min.js"></script>
	<script src="./assets/js/main.js"></script>
</body>

</html>