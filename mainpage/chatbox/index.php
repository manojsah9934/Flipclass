<?php
session_start();
include("dbconnection.php");
include("links.php");

if(isset($_GET["userId"]))
{
	$_SESSION["userId"] = $_GET["userId"];
	header("location: chatbox.php");
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title> </title>
	</head>
	<body>
		<div class = "modal-dialog">
			<div class = "modal-content">
				<div class = "modal-header">
					<h4>Please Select Your Account</h4>
				</div>
					<div class = "modal-body">
						<ol>
						<?php
							$users = mysqli_query($conn, "SELECT * FROM users")
							or die("Failed to query database".mysql_error());
							while($user = mysqli_fetch_assoc($users))
							{
								echo '<li>
									<a href="index.php?userId='.$user["id"].'">'.$user["User"].'</a>
									</li>
								';
							}
						?>
						</ol>
						<a href = "registerUser.php" style = "float:right;">Register here.</a>
						<a href = "http://localhost/project%20flipped%20class/mainpage/Teacherportal.php">Go to Dashboard </a>
					</div>
			</div>
		</div>
	</body>
</html>