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

// Gets subjects data
function getSubjectsData($studentEmail) {
	// Requires config
	require('../config/config.php');
	// Creates and checks connection
	require('../config/db.php');
	// Creates array
	$array = array();
	// SELECT query
	$query = mysqli_query($conn, "SELECT * FROM subjects WHERE subject_id=" . $studentEmail . " ORDER BY subject_id DESC");
	// Loops through array
	while ($row = mysqli_fetch_assoc($query)) {
		$array['subject_id'] = $row['subject_id'];
		$array['subject_name'] = $row['subject_name'];
		$array['subject_grade'] = $row['subject_grade'];
		$array['subject_gpa'] = $row['subject_gpa'];
		$array['subject_attendance'] = $row['subject_attendance'];
		$array['student_email'] = $row['student_email'];
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
	$subjectData = getSubjectsData(getId($_SESSION['student_email']));
}

// SELECT all subjects
$query = "SELECT * FROM subjects JOIN students USING(student_email) WHERE student_id=" . $studentData['student_id'] . " ORDER BY subject_id";

// SELECT subject GPA
$gpaQuery = "SELECT subject_name, subject_gpa FROM subjects JOIN students USING(student_email) WHERE student_id=" . $studentData['student_id'] . " ORDER BY subject_id";

// Gets result
$result = mysqli_query($conn, $query);
$gpaResult = mysqli_query($conn, $gpaQuery);

// Fetches data
$subjects = mysqli_fetch_all($result, MYSQLI_ASSOC);
$subjectsGPA = mysqli_fetch_all($gpaResult, MYSQLI_ASSOC);

// Frees result from memory
mysqli_free_result($result);

// Closes connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>Student Overview | CloseApart</title>
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
	<link rel="stylesheet" href="../assets/css/argon.min.css">
</head>

<body>
	<!-- Side Navigation -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<div class="sidenav-header align-items-center">
				<a class="navbar-brand d-flex justify-content-center" href="../index.php">
					<img src="../assets/images/brand/closeapart-logo-primary.svg" class="mr-2 brand-logo" alt="closeapart logo">
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
								<a class="dropdown-item" href="../quizzes/english/result/startenglishquiz.php">English</a>
								<a class="dropdown-item" href="../quizzes/maths/result/startmathsquiz.php">Maths</a>
								<a class="dropdown-item" href="../quizzes/history/result/starthistoryquiz.php">History</a>
								<a class="dropdown-item" href="../quizzes/geography/result/startgeographyquiz.php">Geography</a>
								<a class="dropdown-item" href="../quizzes/science/result/startsciencequiz.php">Science</a>
								<a class="dropdown-item" href="../quizzes/gaeilge/result/startgaeilgequiz.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./announcements.php">
								<i class='bx bxs-megaphone'></i>
								<span class="nav-link-text">Announcements</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./contact.php">
							<i class='bx bxs-contact'></i>
								<span class="nav-link-text">Contact</span>
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
										<img src='../assets/images/avatars/<?php echo $studentData['student_avatar'] ?>' />
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span class="mb-0 text-sm font-weight-bold"><?php echo $studentData['student_fullname'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right ">
								<a href="./dashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="./settings.php?id=<?php echo $studentData['student_id'] ?>" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="../student/logout.php" class="dropdown-item">
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
											<th scope="col">Grade</th>
											<th scope="col">Attendance</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($subjects as $subject) : ?>
										<tr>
											<th scope="row">
												<?php echo $subject['subject_name'] ?>
											</th>
											<td>
												<?php echo $subject['subject_grade'] . '%' ?>
											</td>
											<td>
												<?php echo $subject['subject_attendance'] . '%' ?>
											</td>
										</tr>
										<?php endforeach; ?>
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
	<script src="../assets/js/argon-design-system-extras.min.js"></script>
	<script src="../assets/js/main.js"></script>
	<script>
		var PieChart = (function () {
				var a = $('#pie-chart');
				a.length &&
					(function (a) {
						var e = new Chart(a, {
							type: 'pie',
							data: {
								labels: ['Attendance', 'Absence (Explained)', 'Absence (Unexplained)'],
								datasets: [{
									label: 'Population (millions)',
									backgroundColor: ['#2dce89', '#ffda09', '#f5365c'],
									data: [<?php echo $studentData['attendance'] ?>, <?php echo $studentData['attendance_explained'] ?>, <?php echo $studentData['attendance_unexplained'] ?>]
								}]
							}
						});
						a.data('chart', e);
					})(a);
			})(),
			BarChart = (function () {
				var a = $('#bar-chart');
				a.length &&
					(function (a) {
						var e = new Chart(a, {
							type: 'bar',
							data: {
								labels: [
									<?php
										foreach($subjectsGPA as $subjectGPA) {
											echo "'" . $subjectGPA['subject_name'] . "'" . ",";
										} 
									?>
								],
								datasets: [{
									backgroundColor: ['#5e72e4', '#5e72e4', '#5e72e4', '#5e72e4', '#5e72e4', '#5e72e4'],
									data: [
										<?php
											foreach($subjectsGPA as $subjectGPA) {
												echo $subjectGPA['subject_gpa'] . ",";
											} 
										?>
									]
								}]
							},
							options: {
								legend: {
									display: false
								},
								title: {
									display: true,
									text: 'Total GPA of ' + new Date().getFullYear()
								},
								scales: {
									yAxes: [{
										ticks: {
											callback: function (value, index, values) {
												return value;
											}
										}
									}]
								}
							}
						});
						a.data('chart', e);
					})(a);
			})();
	</script>
</body>

</html>