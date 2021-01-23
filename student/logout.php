<?php
// Starts session
session_start();

// Destroys session
session_destroy();

// Redirects to login.php
header('Location: login.php?success=' . urlencode('<strong>Success!</strong> You have logged out'));
exit();

?>