<?php
// Starts session
session_start();

// Requires Config
require('config/config.php');
// Creates and Checks Connection
require('config/db.php');

// Puts session variable into $email
$email = $_SESSION['student_email'];

// Gets ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// SELECT Query
$query = "SELECT * FROM students";

// Gets Result
$result = mysqli_query($conn, $query);

// Fetch Data
$lists = mysqli_fetch_assoc($result);

// Free's result from memory
mysqli_free_result($result);

// Closes Connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>CloseApart</title>
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
	<link rel="stylesheet" href="assets/css/argon.min.css">
</head>

<body>
	<!-- Side Navigation -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<div class="sidenav-header align-items-center">
				<a class="navbar-brand d-flex justify-content-center" href="./index.php">
					<img src="assets/images/closeapart-logo-primary.svg" class="mr-2 brand-logo">
					<span class="font-weight-bold text-primary">Close</span><span
						class="font-weight-light text-primary">Apart</span>
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="./studentdashboard.php">
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
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<img
											src='./assets/images/faces/<?php echo $lists['student_avatar'] ?>' />
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span class="mb-0 text-sm font-weight-bold">David</span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right ">
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
						<div class="card-header">
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Edit profile </h3>
								</div>
								<div class="col-4 text-right">
									<a href="#" class="badge badge-pill badge-lg badge-primary">Settings</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="studentprofile"
                enctype="multipart/form-data" class="needs-validation" novalidate>
								<h6 class="heading-small text-muted mb-4">Basic information</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label class="form-control-label" for="student-avatar">Avatar</label>
												<input type="file" id="input-picture" class="form-control" name="student-avatar"
													placeholder="Insert Image">
											</div>
											<div class="form-group">
												<label class="form-control-label" for="student-fullname">Full Name</label>
												<input type="text" id="student-fullname" class="form-control"
													placeholder="First Name, e.g. John Doe" value="<?php echo $lists['student_fullname']; ?>">
											</div>
											<div class="form-group">
												<label class="form-control-label" for="student-email">Email Address</label>
												<input type="email" id="student-email" class="form-control"
													placeholder="Email Address e.g. jdoe@gmail.com" value="<?php echo $lists['student_email']; ?>" disabled>
											</div>
											<div class="form-group">
												<label class="form-control-label" for="student-phone">Phone Number</label>
												<input type="text" class="form-control" id="student-phone" name="student-phone"
													placeholder="Phone Number, e.g. 0891234567" value="<?php echo $lists['student_phone']; ?>">
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Address -->
								<h6 class="heading-small text-muted mb-4">Contact information</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="form-control-label" for="student-address">Address</label>
												<input id="student-address" name="student-address" class="form-control" placeholder="Home Address"
													value="<?php echo $lists['student_address']; ?>" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label class="form-control-label" for="student-city">City</label>
												<input type="text" id="student-city" class="form-control" placeholder="City" value="<?php echo $lists['student_city']; ?>">
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label class="form-control-label" for="student-country">Country</label>
												<input type="text" id="student-country" class="form-control" placeholder="Country"
													value="<?php echo $lists['student_country']; ?>">
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label class="form-control-label" for="student-eircode">Eircode</label>
												<input type="text" id="student-eircode" class="form-control" placeholder="Eircode"
													value="<?php echo $lists['student_eircode']; ?>">
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Description -->
								<h6 class="heading-small text-muted mb-4">About me</h6>
								<div class="pl-lg-4">
									<div class="form-group">
										<label class="form-control-label">About Me</label>
										<textarea rows="4" class="form-control" placeholder="Tell us about youself..."><?php echo $lists['student_bio']; ?></textarea>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
	<script src="./assets/js/argon-design-system-extras.min.js"></script>
	<script src="./assets/js/main.js"></script>
</body>

</html>