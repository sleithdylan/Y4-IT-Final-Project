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

if(isset($_POST["submitmcq"]))
{
    $current_mcq_no = $_SESSION["current_mcq_no"];
    $current_mcq = $_SESSION["quiz"][$current_mcq_no];
    
    if($current_mcq_no <= 9) {
        $submitted_mcq_no = $current_mcq_no - 1;
        $submitted_mcq = $_SESSION["quiz"][$submitted_mcq_no];
        if(isset($_POST["answer"])) {
            if($_POST["answer"] == $submitted_mcq["correct_answer"]){
                $_SESSION["answers"][$submitted_mcq_no] = 1;
            } else{
                $_SESSION["answers"][$submitted_mcq_no] = 0;
            }
        } else {
            $_SESSION["answers"][$submitted_mcq_no] = 0;        
        } 
        $_SESSION["current_mcq_no"] = $current_mcq_no + 1;
    } else {
        $submitted_mcq_no = $current_mcq_no - 1;
        $submitted_mcq = $_SESSION["quiz"][$submitted_mcq_no];
        if(isset($_POST["answer"])) {
            if($_POST["answer"] == $submitted_mcq["correct_answer"]){
                $_SESSION["answers"][$submitted_mcq_no] = 1;
            } else{
                $_SESSION["answers"][$submitted_mcq_no] = 0;
            }
        } else {
            $_SESSION["answers"][$submitted_mcq_no] = 0;        
        } 
        header("location: result.php");
        exit;
    }
} else {
    $current_mcq_no = $_SESSION["current_mcq_no"];
    $current_mcq = $_SESSION["quiz"][$current_mcq_no];
    $_SESSION["current_mcq_no"] = $current_mcq_no + 1;
}

// Gets ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// SELECT Query
$query = "SELECT * FROM students WHERE student_id = {$id}";

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
	<title>Science Quiz | CloseApart</title>
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
					<img src="../../../assets/images/brand/closeapart-logo-primary.svg" class="mr-2 brand-logo">
					<span class="font-weight-bold text-primary">Close</span><span
						class="font-weight-light text-primary">Apart</span>
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
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-game'></i>
								<span class="nav-link-text">Quizzes</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../../english/result/startenglishquiz.php">English</a>
								<a class="dropdown-item" href="../../maths/result/startmathsquiz.php">Maths</a>
								<a class="dropdown-item" href="../../history/result/starthistoryquiz.php">History</a>
								<a class="dropdown-item" href="../../geography/result/startgeographyquiz.php">Geography</a>
								<a class="dropdown-item" href="../result/startsciencequiz.php">Science</a>
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
									 <img src='../../../assets/images/avatars/<?php echo $studentData['student_avatar'] ?>'/>
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span class="mb-0 text-sm font-weight-bold"><?php echo $studentData['student_fullname'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right ">
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
		<!-- quiz -->
		<div class="container-fluid mt-4">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body text-center">
							<div class="container my-2 py-2">
								<div class="row flex-md-column flex-lg-row justify-content-center align-items-center my-5 py-5">
									<div class="col-md-6 col-sm-12">
										<h1 class="display-2">Science Quiz</h1>
										<div class="current">Question: <?php echo $current_mcq_no + 1; ?>/10</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<p class="display-4 text-align-left"><?php echo $current_mcq["question"] ?></p>

										<form class="d-flex flex-column flex-wrap align-items-start" method="post" action="science.php">
											<div><input class="mr-3" type="radio" name="answer" value="1"/><?php echo $current_mcq["answer_one"] ?><br/><br/></div>
											<div><input class="mr-3" type="radio" name="answer" value="2"/><?php echo $current_mcq["answer_two"] ?><br/><br/></div>
											<div><input class="mr-3" type="radio" name="answer" value="3"/><?php echo $current_mcq["answer_three"] ?><br/><br/></div>
											<div><input class="mr-3" type="radio" name="answer" value="4"/><?php echo $current_mcq["answer_four"] ?><br/><br/></div>
										<div><input class="btn btn-primary text-capitalize" type="submit" name="submitmcq" value="Submit Answer" />
										</form>
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