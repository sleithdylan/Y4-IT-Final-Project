<?php include "database.php"; ?>
<?php session_start(); ?>
<?php
//Set question number
$number = (int) $_GET['n'];

//Get total number of questions
$query = "select * from mathsquestions";
$results = $mysqli->query($query) or die($mysqli->error . __LINE__);
$total = $results->num_rows;

// Get Question
$query = "select * from `mathsquestions` where question_number = $number";

//Get result
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);
$question = $result->fetch_assoc();


// Get Choices
$query = "select * from `mathschoices` where question_number = $number";

//Get results
$choices = $mysqli->query($query) or die($mysqli->error . __LINE__);

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Needs -->
	<title>CloseApart</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="About CloseApart..">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Stylesheets -->
	<!-- <link rel="stylesheet" href="css/style.css" type="text/css" /> -->
	<link rel="stylesheet" href="../../assets/css/argon-design-system.min.css">
	<link rel="stylesheet" href="../../assets/css/argon-design-system-extras.min.css">
</head>

<body>
	<!-- Navigation -->
	<nav id="navbar-main" class="navbar navbar-expand-lg bg-primary navbar-dark">
		<div class="container">
			<a class="navbar-brand" href="./index.php">
				<span class="font-weight-bold">Close</span><span class="font-weight-light">Apart</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbarDropdown">
				<div class="navbar-collapse-header">
					<div class="row">
						<div class="col-6 collapse-brand">
							<a class="navbar-brand" href="./index.php">
								<span class="font-weight-bold">Close</span><span class="font-weight-light">Apart</span>
							</a>
						</div>
						<div class="col-6 collapse-close">
							<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="./index.php#features">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./index.php#testimonials">Testimonials</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Log in
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./login.php">As Student</a>
							<a class="dropdown-item" href="./login.php">As Staff</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Sign up
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./signup.php">As Student</a>
							<a class="dropdown-item" href="./signup.php">As Staff</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container my-5 py-5">
		<div class="row flex-md-column flex-lg-row justify-content-center align-items-center">
			<div class="col">
				<h1 class="display-2">Maths Quiz</h1>
				<div class="current">Question <?php echo $number; ?> of <?php echo $total; ?></div>

			</div>
			<div class="col">
				<p class="question display-4">
					<?php echo $question['question'] ?>
				</p>
				<div class="d-flex align-items-center">
					<form method="post" action="process.php">
						<ul class="list-group list-group-flush my-4">
							<?php while ($row = $choices->fetch_assoc()) : ?>
								<li class="list-group-item"><input name="choice" type="radio" value="<?php echo $row['id']; ?>" />
									<?php echo $row['choice']; ?>
								</li>
							<?php endwhile; ?>
						</ul>
						<input type="submit" value="submit" class="btn btn-primary mt-4" />
						<input type="hidden" name="number" value="<?php echo $number; ?>" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer>
		<nav class="bg-white navbar-light border-top">
			<div class="container py-5">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="d-flex flex-column">
							<a class="navbar-brand mb-5" href="./index.php">
								<span class="font-weight-bold">Close</span><span class="font-weight-light">Apart</span>
							</a>
						</div>
					</div>
					<div class="col-md col-sm-6">
						<ul class="navbar-nav mb-5">
							<li class="nav-item">
								<a class="nav-link active disabled pt-0" href="#">Product</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#use-cases">Use Cases</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#help-centre">Help Centre</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#status">Status</a>
							</li>
						</ul>
					</div>
					<div class="col-md col-sm-6">
						<ul class="navbar-nav mb-5">
							<li class="nav-item">
								<a class="nav-link active disabled pt-0" href="#">Company</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="./index.php#features">Features</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="./index.php#testimonials">Testimonials</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#sitemap">Sitemap</a>
							</li>
						</ul>
					</div>
					<div class="col-md col-sm-6">
						<ul class="navbar-nav mb-5">
							<li class="nav-item">
								<a class="nav-link active disabled pt-0" href="#">Legal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#terms">Terms & Conditions</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#privacy">Privacy Policy</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2" href="#disclaimer">Disclaimer</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="d-flex flex-column">
							<p class="text-dark">&copy; CloseApart</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="socials mb-3 d-flex justify-content-sm-start justify-content-md-between">
							<a class="text-dark h4" href="#">
								<i class='bx bxl-twitter'></i>
							</a>
							<a class="text-dark h4 mx-4" href="#">
								<i class='bx bxl-facebook-square'></i>
							</a>
							<a class="text-dark h4" href="#">
								<i class='bx bxl-instagram'></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</footer>
</body>

</html>