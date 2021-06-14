<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "filecontrol";
$dbPassword = "ZXC][p123";
$dbName     = "filecontrol";

// Create database connection
$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>