<?php 
	session_start(); 
	
	if (isset($_GET['logout'])) {
		session_destroy();
		header("location: http://localhost/project%20flipped%20class/login.php");
	}
?>

<?php
	
$servername = 'localhost';
	$userdb = 'root';
	$passdb = '';
	$dbname = 'assignmentdb';
	
	$conn = mysqli_connect($servername, $userdb, $passdb, $dbname);
	if(!$conn)
	{
		die('could not connect');
	}
	
	
	//variable declaration
	$uname  = $_SESSION["username"];
	$answer1= "";
	$answer2 = "";
	$answer3= "";
	$answer4 = "";

	
	
	//Register USER
	if (isset($_POST['submit'])) {
		// receive all input values from the form
		//$uname = mysqli_real_escape_string($conn, $_POST['answer']);
		$answer1 = mysqli_real_escape_string($conn, $_POST['answer1']);
		$answer2 = mysqli_real_escape_string($conn, $_POST['answer2']);
		$answer3 = mysqli_real_escape_string($conn, $_POST['answer3']);
		$answer4 = mysqli_real_escape_string($conn, $_POST['answer4']);
		
		
		
		
		
		// register user if there are no errors in the form
		
	$sql = "INSERT INTO assiegment_submit values('$uname', '$answer1', '$answer2', '$answer3', '$answer4')";
			
		//mysqli_query($conn, $query);
	if (mysqli_query($conn,$sql)) {
	echo "New record created successfully";
} else {
	echo "Error: ";
}

$conn->close();
			
			
		}


	
?>


<html>
	<head>
		<title> Student page </title>
		<meta name = "viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" href = "flipclass.css">
		<link rel = "stylesheet" type = "text/css" href = "css/style.css"> 
		<link rel = "stylesheet" type = "text/css" href = "bootstrap/css/bootstrap.min.css">
	<style>
		* {box-sizing: border-box}
		body {font-family: "Lato", sans-serif;}

		/* Style the tab */
		.tab {
		  float: left;
		  border: 1px solid #ccc;
		  background-color: #000000;
		  width: 20%;
		  height: 830px;
		}

		/* Style the buttons inside the tab */
		.tab button {
		  display: block;
		  background-color: inherit;
		  color: white;
		  padding: 22px 16px;
		  width: 100%;
		  border: none;
		  outline: none;
		  text-align: left;
		  cursor: pointer;
		  transition: 0.3s;
		  font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		  background-color: #ddd;
		}

		/* Create an active/current "tab button" class */
		.tab button.active {
		  background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
		  float: left;
		  padding: 0px 12px;
		  border: 1px solid #ccc;
		  width: 80%;
		  border-left: none;
		  height: 830px;
		}
	</style>
	</head>

<body>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="#">Dashboard</a>
	  <a href="#">Profile</a>
	  <a href="#">About</a>
	  <a href="#">Setting</a>
	  <a href="chatbox1/index.php">Chatus us</a>
	  <a href="student.php?logout='1'">Logout</a>
	  
	  
	</div>

	<b><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Student Portal</span></b>
	<!--  END! THIS IS FOR Flipped class (Animated Sidenav)-->
	
	
	<div class="topnav">
		<a class="active" href="#Dashboard">Dashboard</a>
		<a href="#Profile">Profile</a>
		<a href="#About">About</a>
		<div class="topnav-right">
		<a href="#Setting">Setting</a>
		<a href="chatbox1/index.php">Chat us</a>
			<a href="student.php?logout='1'">Logout</a>
		</div>	
	</div>
	<!-- END! THIS IS FOR (Top Nav Bar)-->

	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'videos')" id="defaultOpen">Videos</button>
	  <button class="tablinks" onclick="openCity(event, 'quiz')">Quiz</button>
	  <button class="tablinks" onclick="openCity(event, 'assignment')">Assignment</button>
	</div><!-- This section for vertical tabs for (Side tab)-->
	

	<div id="videos" class="tabcontent">
		<h3>Videos</h3>
		<div class = "row">
			<?php
				include("videosdb.php");
				$q = "SELECT * FROM uploadvideo";
				$query = mysqli_query($conn,$q);
			
				while($row = mysqli_fetch_array($query)){
						
					$name = $row['name'];
					$id = 'hello';
				//echo nl2br("\n videos1");	

			
			?>
			
			<div class = "col-md-4">
				<video width = "200" height = "200" id = "video" controls>
					<source src ="<?php echo 'upload/'.$name  ?>">
					<p> Hello </p>
				</video>
			</div>
				<?php } ?>
		</div>
	</div><!-- This section for Display Videos for (Display videos)-->
			
	<div id="quiz" class="tabcontent">

		
			<main>
			<div class = "menu">
				<a class = "button" href = "main.php"> Take Quiz </a>
			</div>
	</div>
<form action="student.php" method="POST">
	<div id="assignment" class="tabcontent">
	 
	  <h3>Student Assignment</h3>
	  <p> Some question </p>
	  <p> User Name is : </p>
	  	
	 
	<?php

$servername = 'localhost';
	$userdb = 'root';
	$passdb = '';
	$dbname = 'assignmentdb';
	
	$conn = mysqli_connect($servername, $userdb, $passdb, $dbname);
	if(!$conn)
	{
		die('could not connect');
	}
$sql = "SELECT question1, question2,question3,question4 from assignmentquesn where id=1";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "Question1: " . $row["question1"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?> 
			<textarea rows="4" name="answer1" cols="82"> Answer1. </textarea><br><br>
				<?php

$servername = 'localhost';
	$userdb = 'root';
	$passdb = '';
	$dbname = 'assignmentdb';
	
	$conn = mysqli_connect($servername, $userdb, $passdb, $dbname);
	if(!$conn)
	{
		die('could not connect');
	}
$sql = "SELECT question1, question2,question3,question4 from assignmentquesn where id=1";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "Question2: " . $row["question2"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?> 


			<textarea rows="4"  name="answer2" cols="82"> Answer2. </textarea><br><br>
				<?php

$servername = 'localhost';
	$userdb = 'root';
	$passdb = '';
	$dbname = 'assignmentdb';
	
	$conn = mysqli_connect($servername, $userdb, $passdb, $dbname);
	if(!$conn)
	{
		die('could not connect');
	}
$sql = "SELECT question1, question2,question3,question4 from assignmentquesn where id=1";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "Question3: " . $row["question3"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?> 

			
			<textarea rows="4" name="answer3" cols="82"> Answer3. </textarea><br><br>
				<?php

$servername = 'localhost';
	$userdb = 'root';
	$passdb = '';
	$dbname = 'assignmentdb';
	
	$conn = mysqli_connect($servername, $userdb, $passdb, $dbname);
	if(!$conn)
	{
		die('could not connect');
	}
$sql = "SELECT question1, question2,question3,question4 from assignmentquesn where id=1";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "Question4: " . $row["question4"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?> 

			<textarea rows="4" name="answer4" cols="82"> Answer4. </textarea><br><br>

			<input type = "reset" value = "CLEAR" style = "background-color:black;color:white; width:90px;height:30px;"/>
			<input type = "submit" name = "submit" value = "submit" style = "background-color:black;color:white; width:90px;height:30px;"/>

	</div><!-- This section for vertical tabs for (Tab Content)-->
	</form>
	
	<script>
	<!-- This section for vertical tabs for (videos, quiz, assignment)-->
		function openCity(evt, cityName) {
		var i, tabcontent, tablinsks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	
	
	<!-- This section for vertical tabs for (Side nav bar)-->
	function openNav() {
		document.getElementById("mySidenav").style.width = "100%";
	}

		function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
		
	</script>   
</body>
</html> 