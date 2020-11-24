 <?php include "database.php"; ?>

 <?php
	//Get the total questions
	$query="select * from mathsquestions";
	//Get Results
	$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total = $results->num_rows;

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
 			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown"
 				aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
 							<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarDropdown"
 								aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
 						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
 							aria-expanded="false">
 							Log in
 						</a>
 						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
 							<a class="dropdown-item" href="./login.php">As Student</a>
 							<a class="dropdown-item" href="./login.php">As Staff</a>
 						</div>
 					</li>
 					<li class="nav-item dropdown">
 						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
 							aria-expanded="false">
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
 	<div class="container my-5">
 		<div class="row text-center">
 			<div class="col">
 				<h1 class="display-2">Maths Quiz</h1>
 				<h2>Test your Maths Knowledge</h2>
 				<p>This is a multiple choice quiz to test your knowledge about maths</p>
 				<ul class="list-group list-group-flush">
 					<li class="list-group-item">
 						<strong>Number of Questions: </strong> <?php echo $total; ?>
 					</li>
 					<li class="list-group-item">
 						<strong>Type: </strong>Multiple Choice
 					</li>
 					<li class="list-group-item">
 						<strong>Estimatd Time: </strong> <?php echo $total*0.5; ?> minutes
 					</li>
 				</ul>
 				<a href="question.php?n=1" class="btn btn-primary mt-3">Start Quiz</a>
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