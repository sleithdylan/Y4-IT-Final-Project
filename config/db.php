<?php
// Creates Connection
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Checks Connection
if (mysqli_connect_errno()) {
	// Connection Failed
	die("Failed to connect to MySQL: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}
