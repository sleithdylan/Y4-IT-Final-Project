<?php

//* Google Client

// Include Google Client Library for PHP autoload file
require_once '../vendor/autoload.php';

$http = new GuzzleHttp\Client(['verify' => 'C:\MAMP\bin\php\php7.4.1\extras\ssl\cacert.pem']); //? Use for development, FIXES cURL error 60: SSL certificate problem: unable to get local issuer certificate (LOCALHOST)

// Instantiate Google API Client for call Google API
$google_client = new Google_Client();

$google_client->setHttpClient($http); //? Use for development

// Set the OAuth 2.0 Client ID
$google_client->setClientId('694540862174-d8h21eutj9g6plcisqequrid268fq52a.apps.googleusercontent.com');

// Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('12j0bQvV5MDSblwiHcLbXLLY');

// Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Fork/Y4-IT-Final-Project/staff/dashboard.php'); //? Use for development
// $google_client->setRedirectUri('https://closeapart.co/staff/dashboard.php'); //? Use for production

// View their email address
$google_client->addScope('email');

// See their personal info, including any personal info you've made publicly available
$google_client->addScope('profile');

//start session on web page
session_start();

// Localhost's DB
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root';
$DB_NAME = 'closeapart';

// Heroku's DB
// $DB_HOST = 'eu-cdbr-west-03.cleardb.net';
// $DB_USER = 'bc7f23b22e8a0d';
// $DB_PASS = '84e516aa';
// $DB_NAME = 'heroku_c9a46f0e84714fc';
