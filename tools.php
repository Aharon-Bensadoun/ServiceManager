<?php
session_start(); 
require_once "secure.php" ;
include("timeout.php");
include("logging.php");

if(isset($_SESSION["username"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	} 
}

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Service Manager - Tools</title>
      <link rel="icon" type="image/png" href="images\logo.ico"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body>
      <a href="Scripts\Create IIS Sites.ps1" download>Download </a>
   </body>
</html>