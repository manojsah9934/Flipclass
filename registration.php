<?php
	session_start();
	include("connection.php");
	
	//variable declaration
	$fname = "";
	$lname = "";
	$uname = "";
	$email = "";
	$gender = "";
	$errors = array();
	$_SESSION['success'] = "";
	
	//Register USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$uname = mysqli_real_escape_string($conn, $_POST['uname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$gender = $_POST['gender'];
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
		
		// form validation: ensure that the form is correctly filled
		if (empty($fname)) { array_push($errors, "Firstname is required"); }
		if (empty($lname)) { array_push($errors, "Lastname is required"); }
		if (empty($uname)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "email is required"); }
		if (empty($gender)) { array_push($errors, "Gender is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }
		
		if ($password != $cpassword) {
			array_push($errors, "Both passwords does not match");
		}
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$pass = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO stdregistration(fname, lname, uname, email, gender, password) 
					  VALUES('$fname', '$lname', '$uname', '$email', '$gender', '$pass')";
			mysqli_query($conn, $query);

			$_SESSION['uname'] = $uname;
			$_SESSION['success'] = "You are now logged in";
			header('location: mainpage/student.php');
		}

	}

	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
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
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.png" alt="">
				</div>
				<form action = "registration.php" method = "post">
				
					<h3>Student Form</h3>
					
					<?php include('errors.php'); ?>
					
					<div class="form-group">
						
						<input type="text" placeholder="First Name" name = "fname" class="form-control" value = "<?php echo $fname; ?>">	
					
						

						<input type="text" placeholder="Last Name" name = "lname" class="form-control" value = "<?php echo $lname; ?>">

						
					</div>
					<div class="form-wrapper">
					

						<input type="text" placeholder="Username" name = "uname" class="form-control" value = "<?php echo $uname; ?>">
						
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
					
						<input type="text" placeholder="Email Address" name = "email" class="form-control" value = "<?php echo $email; ?>">

						
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
					
						<select name="gender" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
						
					</div>
					<div class="form-wrapper">
					
						<input type="password" placeholder="Password" name = "password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
						
					</div>
					<div class="form-wrapper">
					
						<input type="password" placeholder="Confirm Password" name = "cpassword" class="form-control">
						<i class="zmdi zmdi-lock"></i>
						
					</div>
					<button type = "submit" name = "reg_user">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button><br> 
					<center> <b> Already Have account? </b> <a href="login.php" class = "ca">login</a> </center>
				</form>
			</div>
		</div>
	</body>
</html>