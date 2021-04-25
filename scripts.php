<?php
session_start(); 
// require_once "secure.php" ;
include("timeout.php");
// include("logging.php");

if(isset($_SESSION["username"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	} 
}
?>
<!doctype html>
<html lang="en">

<head>
<title>Scripts - Service Manager</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
	<!-- <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<style>  
	.button-run {
	box-shadow: 0px 0px 14px -7px #3e7327;
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	background-color:#77b55a;
	border-radius:7px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:12px 45px;
	text-decoration:none;
	text-shadow:0px -1px 26px #5b8a3c;
	margin-left: 85%; 
}
.button-run:hover {
    background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
    background-color:#72b352;
}
.button-run:active {
    position:relative;
    top:1px;
}
	</style>
</head>

<body>
		<!-- WRAPPER -->
		<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="assets\img\Logo.PNG" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div class="navbar-btn navbar-btn-right">
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?php echo ' '. $_SESSION["username"];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="scripts.php" class="active"><i class="lnr lnr-code"></i> <span>Scripts</span></a></li>
						<li><a href="downloads.php" class=""><i class="lnr lnr-download"></i> <span>Downloads</span></a></li>
						<li><a href="custom-scripts.php" class=""><i class="lnr lnr-pencil"></i> <span>Custom Scripts</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
<div class="main">

<div class="main-content">
<div class="container-fluid">
<div class="panel panel-headline">
<div class="panel-heading">
	<div class="container">
		<div class="panel-group">
		<br>
		  <div class="panel panel-info">
			<div class="panel-heading">ESI2008</div>
			<div class="panel-body">Restart ESI2008 server<div class="button-run"><button  onclick="window.location.href='script.php?script=test2'"><span>Run</span></button></div></div>
		  </div>
		  <br>
		  <div class="panel panel-info">
			<div class="panel-heading">Spincal</div>
			<div class="panel-body">Restart Spincal service in AppServer<div class="button-run"><button  onclick="window.location.href='script.php?script=test2'"><span>Run</span></button></div></div>
		 </div>
		  <br>
		  <div class="panel panel-info">
			<div class="panel-heading">Sukeret</div>
			<div class="panel-body">Restart Sukeret server<div class="button-run"><button  onclick="window.location.href='script.php?script=test2'"><span>Run</span></button></div></div>
		  </div>
		  <br>
		  <div class="panel panel-info">
			<div class="panel-heading">TibVms</div>
			<div class="panel-body">Restart TibVms server<div class="button-run"><button  onclick="window.location.href='script.php?script=test2'"><span>Run</span></button></div></div>
		  </div>
		  <br>
		  <div class="panel panel-info">
			<div class="panel-heading">SQL Alwayson</div>
			<div class="panel-body">Failover SQL Alwayson<div class="button-run"><button  onclick="window.location.href='script.php?script=test2'"><span>Run</span></button></div></div>
		  </div>
		  <br>
		  <div class="panel panel-info">
			<div class="panel-heading">Exchange</div>
			<div class="panel-body">Create Shared Mailbox<div class="button-run"><button  onclick="window.location.href='script.php?script=test2'"><span>Run</span></button></div></div>
		  </div>
		</div>
	  </div>
</div>
</div>
</div></div>
<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2021 Hadassah Medical Center</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
</body>
	<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
