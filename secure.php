<?php


if(!$_SESSION['loggedin']){
    header("location:login.php");
    die;
 }
?>

