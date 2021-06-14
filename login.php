<?php
    // Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$message = "" ;
session_start(); 
if(@$_SESSION['loggedin']){
    header("location:index.php");
    die;
 }
 
if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}
?>

<!Doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Service Manager</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets\img\Logo.PNG" ></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="ldap.php" method="post">
								<div class="form-group">
									<label for="signin-username" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" name="username" id="signin-username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="signin-password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<br>
								<?php
								if (isset($_SESSION["Login_Validation"])){
									$Login_Validation = $_SESSION["Login_Validation"];
									echo "<span>$Login_Validation</span>";
								}elseif (isset($_SESSION["PermissionError"])){
									$PermissionError = $_SESSION["PermissionError"];
									echo "<span>$PermissionError</span>";
								}elseif (isset($_SESSION["LoginError"])){
									$LoginError = $_SESSION["LoginError"];
									echo "<span>$LoginError</span>";
								}else{
									echo "<span>$message</span>";
								}
                				?>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Service Manager for IT</h1>
							<p>by DevOps Team</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
<?php
    unset($_SESSION["PermissionError"]);
    unset($_SESSION["LoginError"]);
    unset($_SESSION["Login_Validation"]);
?>