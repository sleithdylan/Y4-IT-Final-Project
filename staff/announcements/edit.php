<?php
// Starts session
session_start();

// Include Google Client Library for PHP autoload file
require_once '../../vendor/autoload.php';
// Requires config
require('../../config/config.php');
// Creates and checks connection
require('../../config/db.php');

// Message variables
$msg = '';
$msgClass = '';

// Puts session variable into $email
$email = $_SESSION['staff_email'];
// Puts session variable into $googleEmail
$googleEmail = $_SESSION['email'];

// Gets staff data
function getStaffData($staffId) {
	// Requires config
	require('../../config/config.php');
	// Creates and checks connection
	require('../../config/db.php');
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
	require('../../config/config.php');
	// Creates and checks connection
	require('../../config/db.php');
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
if (isset($_POST['updateannouncement'])) {
	// Gets form data
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);

	// Gets ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// SELECT Query
	$query = "SELECT * FROM announcements WHERE announcement_id = {$id}";

	// UPDATE Query
	$query = "UPDATE announcements SET 
								announcement_subject = '$subject',
								announcement_description = '$description' 
							WHERE announcement_id = {$id}";

	// Checks required fields
	if (mysqli_query($conn, $query) && isset($subject) && isset($description)) {
		//* Passed
		$msg = '<strong>Success!</strong> Announcement has been edited!';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to employerdashboard.php after 1 second
		header('refresh:1; url=announcements.php');
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
$query = "SELECT * FROM announcements WHERE announcement_id = {$id}";

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
	<title>Edit Announcement | CloseApart</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description"
		content="Student’s online second home – participate in quizzes, communicate with teachers, complete your work online! Get comfortable with us">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="../../assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

	<!-- PWA -->
	<link rel='manifest' href='../../manifest.json'>
	<script>
		// Registering our Service worker
		if ('serviceWorker' in navigator) {
			navigator.serviceWorker.register('../../sw.js', {
				scope: './'
			})
		}
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-5271QT8X93"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-5271QT8X93');
	</script>

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
					<img src="../../assets/images/brand/closeapart-logo-primary.svg" class="mr-2 brand-logo"
						alt="closeapart logo">
					<span class="font-weight-bold text-primary">Close</span><span
						class="font-weight-light text-primary">Apart</span>
				</a>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../dashboard.php">
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
								<i class='bx bxs-book'></i>
								<span class="nav-link-text">Subjects</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../subjects/english/english.php">English</a>
								<a class="dropdown-item" href="../subjects/maths/maths.php">Maths</a>
								<a class="dropdown-item" href="../subjects/history/history.php">History</a>
								<a class="dropdown-item" href="../subjects/geography/geography.php">Geography</a>
								<a class="dropdown-item" href="../subjects/science/science.php">Science</a>
								<a class="dropdown-item" href="../subjects/gaeilge/gaeilge.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-game'></i>
								<span class="nav-link-text">Quizzes Panel</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../../quizzes/english/questions/viewquestion.php">English</a>
								<a class="dropdown-item" href="../../quizzes/maths/questions/viewquestion.php">Maths</a>
								<a class="dropdown-item" href="../../quizzes/history/questions/viewquestion.php">History</a>
								<a class="dropdown-item" href="../../quizzes/geography/questions/viewquestion.php">Geography</a>
								<a class="dropdown-item" href="../../quizzes/science/questions/viewquestion.php">Science</a>
								<a class="dropdown-item" href="../../quizzes/gaeilge/questions/viewquestion.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-game'></i>
								<span class="nav-link-text">Quizzes Results</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../../quizzes/english/result/englishresults.php">English</a>
								<a class="dropdown-item" href="../../quizzes/maths/result/mathsresults.php">Maths</a>
								<a class="dropdown-item" href="../../quizzes/history/result/historyresults.php">History</a>
								<a class="dropdown-item" href="../../quizzes/geography/result/geographyresults.php">Geography</a>
								<a class="dropdown-item" href="../../quizzes/science/result/scienceresults.php">Science</a>
								<a class="dropdown-item" href="../../quizzes/gaeilge/result/gaeilgeresults.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../attendances/attendances.php">
								<i class='bx bxs-calendar-check'></i>
								<span class="nav-link-text">Attendances</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="./announcements.php">
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
										<img src='../../assets/images/avatars/<?php echo $staffData['staff_avatar'] ?>' />
										<?php endif; ?>
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span
											class="mb-0 text-sm font-weight-bold"><?php echo $staffData['staff_fullname'] . $_SESSION['givenName'] . ' ' . $_SESSION['familyName'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right ">
								<a href="../dashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="../settings.php?id=<?php echo $staffData['staff_id'] . $_SESSION['id'] ?>"
									class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="../logout.php" class="dropdown-item">
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
									<h3 class="mb-0">Edit Announcement</h3>
								</div>
							</div>
						</div>
						<div class="card-body">
							<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="postannouncement"
								enctype="multipart/form-data">
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label class="form-control-label" for="subject">Subject</label>
												<input type="text" id="subject" name="subject" class="form-control"
													value="<?php echo $lists['announcement_subject']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-control-label" for="description">Description</label>
												<textarea rows="4" class="form-control" id="description" name="description"
													required><?php echo $lists['announcement_description']; ?></textarea>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<div class="d-flex">
									<button type="submit" name="updateannouncement" class="btn btn-primary flex-grow-1">Edit
										Announcement</button>
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
	<script src="../../assets/js/argon-design-system-extras.min.js"></script>
	<script src="../../assets/js/main.js"></script>
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

		$("#postannouncement").validate({
			rules: {
				subject: {
					required: true,
				},
				description: {
					required: true,
				}
			},
			messages: {
				subject: {
					required: "Please enter a subject",
				},
				description: {
					required: "Please enter a description"
				}
			}
		});
	</script>
</body>

</html>