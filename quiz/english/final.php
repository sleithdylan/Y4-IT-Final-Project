<?php
// Requires Config
require('../config/config.php');
// Creates and Checks Connection
require('../config/db.php');

session_start();

//Create Select Query
$query = "select * from shouts order by time desc limit 100";
$shouts = mysqli_query($con, $query);

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
	<link rel="shortcut icon" href="../../assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../../assets/css/argon.min.css">
</head>

<body>
	<!-- Side Navigation -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<div class="sidenav-header align-items-center">
				<a class="navbar-brand d-flex justify-content-center" href="../../index.php">
					<img src="../../assets/images/brand/closeapart-logo-primary.svg" class="mr-2 brand-logo">
					<span class="font-weight-bold text-primary">Close</span><span class="font-weight-light text-primary">Apart</span>
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../../student/dashboard.php">
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
								<a class="dropdown-item" href="../maths/maths.php">Maths</a>
								<a class="dropdown-item" href="./english.php">English</a>
								<a class="dropdown-item" href="../history/history.php">History</a>
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
												<img alt="Image placeholder" src="../../assets/images/testimonials/john.jpg" class="avatar rounded-circle">
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
										<img src='../../assets/images/avatars/avataaars.png' />
									</span>
									<div class="media-body  ml-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold">David</span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<a href="../../student/dashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="../../student/settings.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="../../student/login.php" class="dropdown-item">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container mt-5 pt-5">
			<div class="row text-center mt-5 pt-5">
				<div class="col-xl-12">
					<h2 class="display-2">You are Done!</h2>
					<p>Congrats! You have completed the quiz</p>
					<p>Final score: <?php echo $_SESSION['score']; ?></p>
					<a href="question.php?n=1" class="start btn btn-primary mt-2">Take Quiz Again</a>
					<?php session_destroy(); ?>
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
	<script src="../../assets/js/argon-design-system-extras.min.js"></script>
	<script src="../../assets/js/main.js"></script>
</body>

</html>