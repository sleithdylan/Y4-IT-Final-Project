<?php
//Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error handler
if ($mysqli->connect_error) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit;
}
