<?php
	$servername = 'localhost';
	$userdb = 'root';
	$passdb = '';
	$dbname = 'quiz';
	
	$conn = mysqli_connect($servername, $userdb, $passdb, $dbname);
	if(!$conn)
	{
		die('could not connect');
	}

?>