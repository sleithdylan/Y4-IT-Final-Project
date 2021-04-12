<?php
// Starts session
session_start();
// Include Google Client Library for PHP autoload file
require_once '../../../vendor/autoload.php';
// Requires config
require('../../../config/config.php');
// Creates and checks connection
require('../../../config/db.php');

// Puts session variable into $email
$email = $_SESSION['student_email'];

// Gets students data
function getStudentsData($studentId) {
	// Include Google Client Library for PHP autoload file
	require_once '../../../vendor/autoload.php';
	// Requires config
	require('../../../config/config.php');
	// Creates and checks connection
	require('../../../config/db.php');
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
	// Include Google Client Library for PHP autoload file
	require_once '../../../vendor/autoload.php';
	// Requires config
	require('../../../config/config.php');
	// Creates and checks connection
	require('../../../config/db.php');
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

require_once("../result/resultprocess.php");
$answers = $_SESSION["answers"];
$geography_result_marks = NULL;
foreach($answers as $answer) {
    if($answer == 1){
        $geography_result_marks += 1;
    }
}

if(isset($_POST["saveResultBtn"])){
    $resultObj = new Result();
    $student_fullname = $studentData['student_fullname'];
    $resultObj->add_result($geography_result_marks, $student_fullname);
}

require_once("../quiz/geographyprocess.php");
if(isset($_POST["startQuizBtn"]))
{
    $quizObject = new Quiz();
    $mcq_ids = $quizObject->get_mcq_ids();
    shuffle($mcq_ids);
    $min = 0;
    $max = (count($mcq_ids)-1)-10;
    $random_index = rand($min, $max);
    $mcq_ids = array_slice($mcq_ids, $random_index, 10);
    $mcq_ids = implode(",",$mcq_ids);
    $mcqs = $quizObject->get_mcqs($mcq_ids);
    shuffle($mcqs);

    $_SESSION["quiz"] = $mcqs;
    $_SESSION["current_mcq_no"] = 0; // array index starts from 0;
    header("location: ./geography.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>Geography Quiz | CloseApart</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Student’s online second home – participate in quizzes, communicate with teachers, complete your work online! Get comfortable with us">
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
	<link rel="stylesheet" href="../../../assets/css/argon-design-system-extras.min.css">
</head>

<body>
	<!-- Side Navigation -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<div class="sidenav-header align-items-center">
				<a class="navbar-brand d-flex justify-content-center" href="../../../index.php">
					<img src="../../../assets/images/brand/closeapart-logo-primary.svg" class="mr-2 brand-logo">
					<span class="font-weight-bold text-primary">Close</span><span class="font-weight-light text-primary">Apart</span>
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../../../student/dashboard.php">
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
								<a class="dropdown-item" href="../../english/result/startenglishquiz.php">English</a>
								<a class="dropdown-item" href="../../maths/result/startmathsquiz.php">Maths</a>
								<a class="dropdown-item" href="../../history/result/starthistoryquiz.php">History</a>
								<a class="dropdown-item" href="../result/startgeographyquiz.php">Geography</a>
								<a class="dropdown-item" href="../../science/result/startsciencequiz.php">Science</a>
								<a class="dropdown-item" href="../../gaeilge/result/startgaeilgequiz.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../../student/announcements.php">
								<i class='bx bxs-megaphone'></i>
								<span class="nav-link-text">Announcements</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../../student/contact.php">
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
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
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
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
									 <img src='../../../assets/images/avatars/<?php echo $studentData['student_avatar'] ?>'/>
									</span>
									<div class="media-body  ml-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold"><?php echo $studentData['student_fullname'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<a href="../../../student/dashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="../../../student/settings.php?id=<?php echo $studentData['student_id'] ?>" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="../../../student/logout.php" class="dropdown-item">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- result -->
		<div class="container-fluid mt-4">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body text-center">
							<div class="container pt-2 pb-2">
								<div class="row text-center">
									<div class="col-xl-12">
										<div class="flex-wrapper">
												<div class="single-chart">
													<svg viewBox="0 0 36 36" class="circular-chart blue">
														<path class="circle-bg"
															d="M18 2.0845
															a 15.9155 15.9155 0 0 1 0 31.831
															a 15.9155 15.9155 0 0 1 0 -31.831"
														/>
														<path class="circle"
															stroke-dasharray=" <?php echo $geography_result_marks*10 ;?> , 100"
															d="M18 2.0845
															a 15.9155 15.9155 0 0 1 0 31.831
															a 15.9155 15.9155 0 0 1 0 -31.831"
														/>
													<text x="18" y="20.35" class="percentage"> <?php echo $geography_result_marks*10 ;?> % </text>
													</svg>
												</div>
											</div>
											<h2 class="display-2">You are Done!</h2>
											<p>Congrats! You have completed the quiz</p>
											<p>Your final score is <?php echo $geography_result_marks ;?>/10</p>
											<form action="#" method="post">
												<input class="btn btn-primary text-capitalize mb-3" type="submit" name="saveResultBtn" value="Save Result" />
												</br>
												<a href="../../../student/dashboard.php" class="btn btn-outline-primary text-capitalize">Exit</a>
												<input class="btn btn-outline-primary text-capitalize" type="submit" name="startQuizBtn" value="Restart Quiz" />
											</form>
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
	<script src="../../../assets/js/argon-design-system-extras.min.js"></script>
	<script src="../../../assets/js/main.js"></script>
</body>

</html>