<?php
	$servername = 'localhost';
	$userdb = 'root';
	$passdb = '';
	$dbname = 'videos';
	
	$conn = mysqli_connect($servername, $userdb, $passdb, $dbname);
	if(!$conn)
	{
		die('could not connect');
	}

?>