<?php

	$username = 'localhost'; //local host connect 
	$dbuser = 'root';
	$dbpass = "";
	$dbname = 'student_registration_form';
	$conn = mysqli_connect($username, $dbuser, $dbpass, $dbname);
	
	if(!$conn)
	{
		die("Could not connect");
	}


?>