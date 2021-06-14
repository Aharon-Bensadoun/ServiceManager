<?php
session_start(); 
require_once "secure.php" ;
include("timeout.php");
include("logging.php");

if(isset($_SESSION["username"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
		die ;
	}
}

if (isset($_GET['script'])) {
	$psScriptPath = "C:\\temp\\'".$_GET["script"]."'.ps1" ;
}

$Return = shell_exec("C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\powershell.exe -ExecutionPolicy Bypass -NoProfile -InputFormat none -command $psScriptPath") ;

$Output = " <pre> $Return </pre>";
($_SESSION["Output"] = $Output);

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <style>
    body {margin:0;}

    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #3a4969;
    position: fixed;
    top: 0;
    width: 100%;
    font-size: 18px;
    text-decoration: none;
    }

    li {
    float: left;
    text-decoration: none;
    }

    li a {
    display: block;
    color: white;
    text-align: center;
    padding: 30px 50px;
    text-decoration: none;
    }

    li a:hover:not(.active) {
    background-color: #5a8ca8;
    }

    .active {
    background-color: #4b69ee;
    }
    .button {
    border-radius: 4px;
    background-color: #3f8d0c;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 16px;
    padding: 7px;
    width: 150px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
    float: right;
    }
    
    .button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
    }
    
    .button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
    }
    
    .button:hover span {
      padding-right: 25px;
    }
    
    .button:hover span:after {
    opacity: 1;
    right: 0;
    }

    br {
    display: block;
    margin: 10px 0;

    }
    .panel-heading {
    font-weight: bold;
    }
    </style>
    </head>
<body>
<ul>
  <li><a href="index.php"><b>Home</b></a></li>
  <li><a href="tools.php"><b>Tools</b></a></li>
  <li><a href="logout.php"><b>Logout</b></a></li>
  <li><a><b><?php echo ' '. $_SESSION["username"];?></b></a></li>
</ul>
<br>
<br>
<br>
<br>
<br>
<?php
  if(isset($_SESSION["Output"])){    
  $Output = $_SESSION["Output"];
  echo "<span>$Output</span>";
  }
?> 

</body>

</html>

<?php
  unset($_SESSION["Output"]);
  unset($_SESSION["LoginError"]);
?>