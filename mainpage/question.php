<?php
	include 'db.php';
	session_start();
	
	//Set Question Number
	$number = $_GET['n'];
	
	//Query for the Question
	$query = "SELECT * FROM questions WHERE question_number = $number";
	
	//Get the question
	$result = mysqli_query($conn, $query);
	$question = mysqli_fetch_assoc($result);
	
	//GET Choices
	$query = "SELECT * FROM options WHERE question_number = $number";
	$choices = mysqli_query($conn, $query);
	
	//GET Total questions
	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($conn, $query));
?>


<html>
	<head>
		<title> Quiz </title>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	<body>
		<main>
			<div class = "container">
				<div class = "current"> Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div>
				<p class = "question"> <?php echo $question['question_text']; ?> </p>
				<form method = "POST" action = "process.php">
					<ul class = "choicess">
						<?php while($row = mysqli_fetch_assoc($choices)) { ?>
						<li><input type = "radio" name = "choice" value = "<?php echo $row['id']; ?>"><?php echo $row['coption']; ?></li>
						<?php } ?>
					
					
					</ul>
					<input type = "hidden" name = "number" value = "<?php echo $number; ?>">
					<input type = "submit" name = "submit" value = "submit">
				</form>
			</div>
		</main>	
	</body>
</html>