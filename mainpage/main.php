<?php
	include 'db.php';
	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($conn,$query));
	
?>

<html>
	<head>
		<title> Main.php </title>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	
	<body>
	<main>
		<div class = "container">
			<h2> Test your knowledge </h2>
			<p>
				This is a multiple choise quiz test.
			</p>
			<ul>
				<li> <strong> Number of Questions:</strong><?php echo $total_questions; ?> </li>
				<li> <strong> Type: </strong> Multiple Choice </li>
				<li> <strong> Estimated Time: </strong> <?php echo $total_questions*1.5; ?></li>
			</ul>
			
			<a href = "question.php?n=1" class = "start"> Start Quiz </a>
		</div>
	</body>			
			
</html>