<?php
include 'dbConfig.php';
session_start(); 
require_once "secure.php" ;
include("timeout.php");
include("logging.php");

if(isset($_SESSION["username"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	} 
}

if (isset($_GET['view'])) {
	$psviewPath = $_SERVER["DOCUMENT_ROOT"] . '/ServiceManager/Scripts/'.$_GET["view"].'.ps1';
}

$file= $psviewPath ;

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
  <a class="align-to-right" href="output.php?script=UserInfo"><?php echo ' '. $_SESSION["username"];?></a>
  <a class="align-to-right"href="Logout.php">Logout</a>
</div>

<?php

highlight_file( $file );

?>
  
</body>

</html>

<?php
  // unset($_SESSION["Output"]);
  // unset($_SESSION["LoginError"]);
?>