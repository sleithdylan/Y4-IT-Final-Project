<?php
require_once("questionprocess.php");
$mcqObject = new MCQ();
if(isset($_POST["updatemcq"]))
{
    $mcqObject->update_mcq();
}
$mcq = NULL;
if(isset($_GET['gaeilge_quiz_id']))
{
    $mcq = $mcqObject->get_mcq($_GET["gaeilge_quiz_id"]);    
}


// Starts session
session_start();

// Include Google Client Library for PHP autoload file
require_once '../../../vendor/autoload.php';
// Requires config
require('../../../config/config.php');
// Creates and checks connection
require('../../../config/db.php');

//* GOOGLE DATA 
if(isset($_GET["code"])) {

	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

	if(!isset($token['error'])) {
		$google_client->setAccessToken($token['access_token']);

		//Store "access_token" value in $_SESSION variable for future use.
		$_SESSION['access_token'] = $token['access_token'];
	
		//Create Object of Google Service OAuth 2 class
		$google_service = new Google_Service_Oauth2($google_client);
	
		//Get user profile data from google
		$data = $google_service->userinfo->get();

		if(!empty($data['id']))
	  {
			$_SESSION['id'] = $data['id'];
			$googleId = $_SESSION['id'];
	  }

	  if(!empty($data['email']))
	  {
			$_SESSION['email'] = $data['email'];
			$googleEmail = $_SESSION['email'];
	  }

	  if(!empty($data['gender']))
	  {
			$_SESSION['gender'] = $data['gender'];
			$googleGender = $_SESSION['gender'];
	  }

	  if(!empty($data['picture']))
	  {
			$_SESSION['picture'] = $data['picture'];
			$googlePicture = $_SESSION['picture'];
	  }

	  if(!empty($data['family_name']))
	  {
			$_SESSION['familyName'] = $data['family_name'];
			$googleFamilyName = $_SESSION['familyName'];
		}
		
	  if(!empty($data['given_name']))
	  {
			$_SESSION['givenName'] = $data['given_name'];
			$googleGivenName = $_SESSION['givenName'];
		}

		//Check if user exists
		$checkIfExists = "SELECT * FROM staff WHERE staff_email='" . $googleEmail . "'";
    $result = mysqli_query($conn, $checkIfExists);
    $rowcount=mysqli_num_rows($result);

    if($rowcount > 0){
				// Return
        header('Location: ./dashboard.php');

    } else {
       // INSERT Query
			$query = "INSERT INTO staff(staff_fullname, staff_email, staff_avatar, google_id) 
			VALUES('$googleGivenName $googleFamilyName', '$googleEmail', '$googlePicture', '$googleId')";
			$queryClass = "INSERT INTO classes(class_name, staff_email) 
			VALUES('$googleGivenName $googleFamilyName', '$googleEmail')";

			$result = mysqli_query($conn, $query);
			$result += mysqli_query($conn, $queryClass);

			header('Location: ./dashboard.php');
    }
	}
}

// Puts session variable into $email
$email = $_SESSION['staff_email'];

// Checks for posted data
if (isset($_POST['delete'])) {
  // Gets form data
  $delete_id = mysqli_real_escape_string($conn, $_POST['delete-id']);

  // DELETE Query
  $query = "DELETE FROM students WHERE student_id = {$delete_id}";

  if (mysqli_query($conn, $query)) {
    // Passed
    $msg = '<strong>Success!</strong> Student has been removed';
    $msgClass = 'alert-success alert-dismissible fade show mt-4';
    // Redirects to index.php
    header('refresh:1; url=dashboard.php');
  }
  else {
    // Failed
    // Returns error
    $msg = '<strong>Error!</strong> Something went wrong.. (' . mysqli_error($conn) . ')';
    $msgClass = 'alert-danger alert-dismissible fade show my-4';
  }

}

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

// If user is not logged in
if (!isset($_SESSION['staff_email']) && !isset($_SESSION['access_token'])) {
	// Redirect to the staff login with error message
	header('Location: ../../../staff/login.php?err=' . urlencode('<strong>Error!</strong> You need to log in!'));
	exit();
}

// Gets user data from id
if (isset($_SESSION['staff_email'])) {
	$staffData = getStaffData(getId($_SESSION['staff_email']));
}

// SELECT Query
$query = "SELECT * FROM students JOIN classes USING(class_id) WHERE staff_email='" . $staffData['staff_email'] . "' OR staff_email='" . $_SESSION['email'] . "' ORDER BY student_id ASC";

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
	<title>Edit Gaeilge Question | CloseApart</title>
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />

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
							<a class="nav-link" href="../../../staff/dashboard.php">
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
								<a class="dropdown-item" href="../../../staff/subjects/english/english.php">English</a>
								<a class="dropdown-item" href="../../../staff/subjects/maths/maths.php">Maths</a>
								<a class="dropdown-item" href="../../../staff/subjects/history/history.php">History</a>
								<a class="dropdown-item" href="../../../staff/subjects/geography/geography.php">Geography</a>
								<a class="dropdown-item" href="../../../staff/subjects/science/science.php">Science</a>
								<a class="dropdown-item" href="../../../staff/subjects/gaeilge/gaeilge.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-game'></i>
								<span class="nav-link-text">Quizzes Panel</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../../english/questions/viewquestion.php">English</a>
								<a class="dropdown-item" href="../../maths/questions/viewquestion.php">Maths</a>
								<a class="dropdown-item" href="../../history/questions/viewquestion.php">History</a>
								<a class="dropdown-item" href="../../geography/questions/viewquestion.php">Geography</a>
								<a class="dropdown-item" href="../../science/questions/viewquestion.php">Science</a>
								<a class="dropdown-item" href="./viewquestion.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class='bx bxs-game'></i>
								<span class="nav-link-text">Quizzes Results</span>
							</a>
							<div class="dropdown-menu shadow-none pl-5" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../result/englishresults.php">English</a>
								<a class="dropdown-item" href="../../maths/result/mathsresults.php">Maths</a>
								<a class="dropdown-item" href="../../history/result/historyresults.php">History</a>
								<a class="dropdown-item" href="../../geography/result/geographyresults.php">Geography</a>
								<a class="dropdown-item" href="../../science/result/scienceresults.php">Science</a>
								<a class="dropdown-item" href="../../gaeilge/result/gaeilgeresults.php">Gaeilge</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../../staff/attendances/attendances.php">
								<i class='bx bxs-calendar-check'></i>
								<span class="nav-link-text">Attendances</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../../staff/announcements/announcements.php">
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
										<img src='../../../assets/images/avatars/<?php echo $staffData['staff_avatar'] ?>' />
										<?php endif; ?>
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span
											class="mb-0 text-sm font-weight-bold"><?php echo $staffData['staff_fullname'] . $_SESSION['givenName'] . ' ' . $_SESSION['familyName'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right ">
								<a href="../../../staff/dashboard.php" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Overview</span>
								</a>
								<a href="../../../staff/settings.php?id=<?php echo $staffData['staff_id'] . $_SESSION['id'] ?>"
									class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Profile Settings</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="../../../staff/logout.php" class="dropdown-item">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Edit Question -->
        <div class="container-fluid mt-4">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header bg-transparent">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="mb-0">Update Gaeilge Quiz Question</h3>
								</div>
							</div>
						</div>
						<div class="card-body">
							<!-- Edit Form -->
                            <?php
                            if(count($mcq) > 0)
                            {
                            ?>
							<form action="editquestion.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="gaeilge_quiz_id" value="<?php echo $mcq["gaeilge_quiz_id"]; ?>" />
                                    <label for="question">Edit Question:</label>
                                    <textarea class="form-control" name="question" cols="100" rows="2"><?php echo $mcq["question"]; ?></textarea>
                                </div>

								<div class="form-group form-row d-flex align-items-end">
									<div class="form-control-label col-md-6">
										<label for="answer_one">Answer one:</label>
										<input type="text" class="form-control" name="answer_one" value="<?php echo $mcq["answer_one"]; ?>" required>
									</div>
									<div class="form-check col-md-6 pl-5">
										<input class="form-check-input py-5" type="radio" name="correct_answer" value="1" <?php echo $mcq["correct_answer"] == "1" ? "checked" : "" ; ?>>
										<label>Select correct answer</label>
									</div>
								</div>
								<div class="form-group form-row d-flex align-items-end">
									<div class="form-control-label col-md-6">
										<label for="answer_two">Answer two:</label>
										<input type="text" class="form-control" name="answer_two" value="<?php echo $mcq["answer_two"]; ?>" required>
									</div>
									<div class="form-check col-md-6 pl-5">
										<input class="form-check-input py-5" type="radio" name="correct_answer" value="2" <?php echo $mcq["correct_answer"] == "2" ? "checked" : "" ; ?>>
										<label>Select correct answer</label>
									</div>
								</div>
								<div class="form-group form-row d-flex align-items-end">
									<div class="form-control-label col-md-6">
										<label for="answer_three">Answer three:</label>
										<input type="text" class="form-control" name="answer_three" value="<?php echo $mcq["answer_three"]; ?>" required>
									</div>
									<div class="form-check col-md-6 pl-5">
										<input class="form-check-input py-5" type="radio" name="correct_answer" value="3" <?php echo $mcq["correct_answer"] == "3" ? "checked" : "" ; ?>>
										<label>Select correct answer</label>
									</div>
								</div>
								<div class="form-group form-row d-flex align-items-end">
									<div class="form-control-label col-md-6">
										<label for="answer_four">Answer four:</label>
										<input type="text" class="form-control" name="answer_four" value="<?php echo $mcq["answer_four"]; ?>" required>
									</div>
									<div class="form-check col-md-6 pl-5">
										<input class="form-check-input py-5" type="radio" name="correct_answer" value="4" <?php echo $mcq["correct_answer"] == "4" ? "checked" : "" ; ?>>
										<label>Select correct answer</label>
									</div>
								</div>
                                <input class="btn btn-primary text-capitalize px-5" type="submit" name="updatemcq" value="Update Question" />
								<a href="./viewquestion.php" class="btn btn-outline-primary text-capitalize px-5">Return</a>
                                <?php
                                } // end if
                                ?>
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
	<script src="../../../assets/js/argon-design-system-extras.min.js"></script>
	<script src="../../../assets/js/main.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>