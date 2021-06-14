<?php
session_start(); 
require_once "secure.php" ;
include "timeout.php";
include "logging.php";
include "dbConfig.php";

ini_set('max_execution_time', '120'); 

if(isset($_SESSION["username"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
		die ;
	}
}
if (isset($_GET['script'])) {
	$psScriptPath = $_SERVER["DOCUMENT_ROOT"] . '/ServiceManager/Scripts/'.$_GET["script"].'.ps1';
}

$Return = shell_exec("C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\powershell.exe -ExecutionPolicy Bypass -NoProfile -InputFormat none -command $psScriptPath") ;

$Output = " <pre> $Return </pre>";
($_SESSION["Output"] = $Output);
?>

<!DOCTYPE html>
<head>
    <title>Service Manager - Home</title>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images\logo.ico"/>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div class="topnav">
<br>
  <a href="index.php">Home</a>
  <a href="upload-script.php">Upload Script</a>
  <a href="create-script.php">Add custom scripts</a>  
  <a class="align-to-right"href="#Username">Username</a>
  <a class="align-to-right"href="Logout.php">Logout</a>
</div>
<?php
  if(isset($_SESSION["Output"])){    
    $Output = $_SESSION["Output"];
    echo "<span>$Output</span>";
    }
?>
<?php
  unset($_SESSION["Output"]);
  unset($_SESSION["LoginError"]);
?>