<?php
// Starts session
session_start();

// Destroys session
session_destroy();

if (isset($_COOKIE['student_email'])) {
	// Delete cookie
	unset($_COOKIE['student_email']);
	// Remove cookie without refreshing browser
	setcookie('student_email', '', time() - 2592000, './login.php');
}

// Redirects to login.php
header('Location: login.php?success=' . urlencode('<strong>Success!</strong> You have logged out'));
exit();

?>