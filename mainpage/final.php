<?php

session_start();
?>

<html>
	<head>
		<title>Final page</title>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	<body>
		<main>
			<div class = "container">
				<h2> Your Result </h2>
				<p> Congratulation you have completed this test successfully.</p>
				<p> Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>
				<?php unset($_SESSION['score']);?>
				<a href = "student.php" style="color: red;"> Home page </a>
				
			</div>
		</main>
	</body>
</html>