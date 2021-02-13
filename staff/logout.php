<?php
// Starts session
session_start();

// Destroys session
session_destroy();

if (isset($_COOKIE['staff_email'])) {
	// Delete cookie
	unset($_COOKIE['staff_email']);
	// Remove cookie without refreshing browser
	setcookie('staff_email', '', time() - 2592000, './login.php');
}

// Redirects to login.php
header('Location: login.php?success=' . urlencode('<strong>Success!</strong> You have logged out'));
exit();

?>