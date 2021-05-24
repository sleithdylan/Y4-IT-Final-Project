<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs -->
	<title>Disclaimer | CloseApart</title>
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

	<!-- PWA -->
	<link rel='manifest' href='./manifest.json'>
	<script>
		// Registering our Service worker
		if ('serviceWorker' in navigator) {
			navigator.serviceWorker.register('sw.js', {
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
	<link rel="stylesheet" href="assets/css/argon-design-system.min.css">
	<link rel="stylesheet" href="assets/css/argon-design-system-extras.min.css">
</head>

<body>
	<!-- Navigation -->
	<?php include('includes/navs/nav.php'); ?>
	<!-- Hero -->
	<div id="terms">
		<div class="container">
			<div class="row py-5">
				<div class="col">
					<h2><strong>Disclaimer for CloseApart</strong></h2>

					<p>If you require any more information or have any questions about our site's disclaimer, please feel free to
						contact us by email at hello@closeapart.co</p>

					<br>

					<h3><strong>Disclaimers for CloseApart</strong></h3>

					<p>All the information on this website - https://closeapart.co/ - is published in good faith and for general
						information purpose only. CloseApart does not make any warranties about the completeness, reliability and
						accuracy of this information. Any action you take upon the information you find on this website
						(CloseApart), is strictly at your own risk. CloseApart will not be liable for any losses and/or damages in
						connection with the use of our website. Our Disclaimer was generated with the help of the <a
							href="https://www.privacypolicyonline.com/disclaimer-generator/">Disclaimer Generator</a> and the <a
							href="https://www.generateprivacypolicy.com">Privacy Policy Generator</a>.</p>

					<p>From our website, you can visit other websites by following hyperlinks to such external sites. While we
						strive to provide only quality links to useful and ethical websites, we have no control over the content and
						nature of these sites. These links to other websites do not imply a recommendation for all the content found
						on these sites. Site owners and content may change without notice and may occur before we have the
						opportunity to remove a link which may have gone 'bad'.</p>

					<p>Please be also aware that when you leave our website, other sites may have different privacy policies and
						terms which are beyond our control. Please be sure to check the Privacy Policies of these sites as well as
						their "Terms of Service" before engaging in any business or uploading any information.</p>

					<br>

					<h3><strong>Consent</strong></h3>

					<p>By using our website, you hereby consent to our disclaimer and agree to its terms.</p>

					<br>

					<h3><strong>Update</strong></h3>

					<p>Should we update, amend or make any changes to this document, those changes will be prominently posted
						here.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<?php include('includes/footers/footer_main.php'); ?>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="./assets/js/argon-design-system.min.js"></script>
	<script src="./assets/js/main.js"></script>
</body>

</html>