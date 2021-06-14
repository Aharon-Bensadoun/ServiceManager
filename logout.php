<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
$url = "login.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");

?>