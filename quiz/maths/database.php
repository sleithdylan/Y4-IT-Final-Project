<?php

/**
 * @file
 * Connect to mysql
 */

//Create connection credentials
// $db_host = 'localhost';
// $db_name = 'closeapart';
// $db_user = 'root';
// $db_pass = 'root';

// Heroku's DB
$db_host = 'eu-cdbr-west-03.cleardb.net';
$db_user = 'bc7f23b22e8a0d';
$db_pass = '84e516aa';
$db_name = 'heroku_c9a46f0e84714fc';


//Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error handler
if ($mysqli->connect_error) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit;
}
