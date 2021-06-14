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
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-lg">
						  <thead>
						    <tr>
							<th>ID</th>
							<th>Script Name</th>
							<th>Description</th>
							<th>Run</th>
							<th>View</th>
							<th>Download</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
                            $result = mysqli_query($con,"SELECT * FROM scripts");

                            while($row = mysqli_fetch_array($result))
                            {
                             
                            ?>

								<td>
								<span><?php echo  $row['id']  ;?></span> 
								</td>
						      <td class="d-flex align-items-center">
						      	<div class="img" style="background-image: url(images/PowerShell.jpg);"></div>
						      	<div class="pl-3 email">

								  <span><?php echo  $row['file_name']  ;?></span>
						      		<span>Added: <?php echo  $row['uploaded_on']  ;?></span>
						      	</div>
						      </td>
						      <td><?php echo  $row['description']  ;?></td>
						      <td >
							<a href="output.php?script=<?php echo $row['file_name']  ;?>">
         					<img alt="Qries" src="images\Run.png"
         					width="50" height="50"></a>
							 </td>
							 <td>
							 <a href="display.php?view=<?php echo $row['file_name']  ;?>">
							 <div class="img" style="background-image: url(images/Show.png);"></div>
							 </td>
							 <td>
							 <a href="download.php?view=<?php echo $row['file_name']  ;?>">
							 <div class="img" style="background-image: url(images/Download.png);"></div>
							 </td>
						    </tr>
							<?php
							}
							mysqli_close($con);
							?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
 
  
</body>

</html>

<?php
  // unset($_SESSION["Output"]);
  // unset($_SESSION["LoginError"]);
?>