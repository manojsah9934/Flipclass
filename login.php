<?php 
session_start(); 
include "connection.php";

	// variable declaration
	$uname = "";
	$errors = array(); 
	$_SESSION['success'] = "";


if (isset($_POST['login_user'])) {
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$_SESSION["username"]=$uname;
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	if (empty($uname)) {
		array_push($errors, "Username is required");
	}
	
	if (empty($password)) {
		array_push($errors, "Password is required");
	}
	
	if (count($errors) == 0) {
		$pass = md5($password);
		$query = "SELECT * FROM stdregistration WHERE uname = '$uname' AND password = '$pass'";
		$results = mysqli_query($conn, $query);
		if(mysqli_num_rows($results) == 1) {
			$_SESSION['uname'] = $uname;
			$_SESSION['success'] = "You are now logged in";
			header('location: mainpage/student.php');
		}
		else
		{
			array_push($errors, "Wrong Username/password combination");
		}
	}
		
}	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LoginForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<style>
			.ca {
				font-size: 14px;
				display: inline-block;
				padding: 10px;
				text-decoration: none;
				color: #444;
				}
					
				.ca:hover {
					text-decoration: underline;
				}
		</style>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.png" alt="">
				</div>
				<form action="login.php" method = "post">
					<h3>Login Page</h3>
					
					<?php include('errors.php'); ?>
					
					<div class="form-wrapper">
						<input type="text" name = "uname" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>

					<div class="form-wrapper">
						<input type="password" name = "password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					
					<button type = "submit" name = "login_user">Log In
						<i class="zmdi zmdi-arrow-right"></i></button><br>
						<center> <b> Don't have an account? </b> <a href="registration.php" class = "ca">Create Account</a> </center>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>