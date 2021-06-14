<?php

$access = "" ;
$log = "" ;
$username = $_SESSION["username"];
// $access = $_GET['script'] ;
if(isset($_SESSION["username"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
		die ;
	}elseif (isset($_SESSION["username"])){
        $log  = "From: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        "User: ".$username.PHP_EOL.
        "Access:" .$access.PHP_EOL;
        file_put_contents('C:\\temp\\'.date("j.n.Y").'.log', $log, FILE_APPEND);

    }
}
?>
