<?php 
	session_start(); 
	
	if (isset($_GET['logout'])) {
		session_destroy();
		header("location: http://localhost/project%20flipped%20class/teacher_login.php");
	}

?>

<?php 
	include 'videosdb.php';
	if (isset($_POST['upload'])) {
		//$name = $_FILES['file'];
		//echo "<pre>";
		//print_r($name);
		//exit();
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$temp_name = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_destination = "upload/".$file_name;
		
		if(move_uploaded_file($temp_name, $file_destination)){
		$q = "INSERT INTO uploadvideo(name) VALUES ('$file_name')";
		
		if(mysqli_query($conn,$q)){
			$success = "video uploaded successfully.";
		}
		else{
			$failed = "Something went wrong??";
		}
	}
	else{
		$msz = "Please select a video to upload..!";
	}
	}//END! THIS IS FOR insert/upload video (upload video)
?>
		
<?php
	include 'db.php';
	if(isset($_POST ['submit'])){
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		
		//Choice Array
		$choice = array();
		$choice[1] = $_POST['choice1'];
		$choice[2] = $_POST['choice2'];
		$choice[3] = $_POST['choice3'];
		$choice[4] = $_POST['choice4'];
		
		//First Query for Questions Table
			$query = "INSERT INTO questions (";
			$query .= "question_number, question_text )";
			$query .= "VALUES (";
			$query .= " '{$question_number}','{$question_text}' ";
			$query .= ")";

		$result = mysqli_query($conn, $query);
		
		//Validate First Query
		if($result){
			foreach($choice as $option => $value){
				if($value != ""){
					if($correct_choice == $option){
						$is_correct = 1;
					}else{
						$is_correct = 0;
					}
					
		//Second Query for Choices Table
			$query = "INSERT INTO options (";
			$query .= "question_number, is_correct, coption)";
			$query .= "VALUES (";
			$query .= " '{$question_number}','{$is_correct}','{$value}' ";
			$query .= ")";
		$insert_row = mysqli_query($conn, $query);
		
		
		//Validate Insertion of choices
			if($insert_row){
				continue;
			}else{
				die("2nd Query for Choices could not be executed");
			}
		}
	}
	$message = "Question added successfully";
}

}
		$query = "SELECT * FROM questions";
		$questions = mysqli_query($conn, $query);
		$total = mysqli_num_rows($questions);
		$next = $total+1;
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

	if(isset($_POST ['submit'])){
	$question1  = $_POST['Questn1'];
	$question2  = $_POST['Questn2'];
	$question3  = $_POST['Questn3'];
	$question4  = $_POST['Questn4'];
	
	$sql = "insert into assignmentquesn (question1,question2,question3,question4) values('$question1','$question2','$question3','$question4')"; 
	mysqli_query($conn, $sql);
	}

?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="flipclass.css">
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
		  width: 15%;
		  height: 800px;
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
		  width: 85%;
		  border-left: none;
		  height: 800px;
		}
		
		input[type="text"]
    {
        border: 0;
        border-bottom: 1px solid red;
        outline: 0;
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
	  <a href="chatbox/index.php">Chat us</a>
	  <a href="Teacherportal.php?logout='1'">Logout</a>
	  
	  
	</div>

	<b><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Teacher Portal</span></b>
	<!--  END! THIS IS FOR Flipped class (Animated Sidenav)-->
	
	
	<div class="topnav">
		<a class="active" href="#Dashboard">Dashboard</a>
		<a href="#Profile">Profile</a>
		<a href="#About">About</a>
		<div class="topnav-right">
		<a href="#Setting">Setting</a>
		<a href="chatbox/index.php">Chat us</a>
			<a href="Teacherportal.php?logout='1'">Logout</a>
		</div>	
	</div>
	<!-- END! THIS IS FOR (Top Nav Bar)-->

	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'videos')" id="defaultOpen">Upload Videos</button>
	  <button class="tablinks" onclick="openCity(event, 'quiz')">Create Quiz</button>
	  <button class="tablinks" onclick="openCity(event, 'assignment')">Create Assignment</button>
	</div><!-- This section for vertical tabs for (Side tab)-->
	
	<form method = "post" action = "Teacherportal.php" enctype = "multipart/form-data">
	<div id="videos" class="tabcontent">
		<h1>Upload Videos</h1>
			<div class = "form-group">
				<label><strong>Upload a Video:</strong></label>
				<input type = "file" name = "file" class = "form-control">
			</div>
			
			<?php if(isset($success)) { ?>
			<div class = "alert alert-success">
				<?php echo $success;?>
			</div>
			
			<?php } ?>
			<?php if(isset($failed)) { ?>
			
			<div class = "alert alert-danger">
			
				<?php echo $failed;?>
			</div>
			
			<?php } ?>
			<?php if(isset($msz)) { ?>
			
			<div class = "alert alert-danger">
				<?php echo $msz;?>
			</div>
			<?php } ?>
		<input type = "submit" name = "upload" value = "UPLOAD" style = "background-color:black;color:white; width:90px;height:30px;"/>
		
	</div>

	<div id="quiz" class="tabcontent">
	<main>
		<div class = "container">
			<h1>Create Quiz</h1>
			<?php if(isset($message)){
				echo "<h4>" . $message . "</h4>";
			} ?>	
		
			<p>
				<b><label> Question Number: </label></b>
				<input type= "number" name = "question_number" value= "<?php echo $next; ?>"/>
			</p>	
			
			<p>	
				<b><label> Question Text: </label></b><br>
				<input type = "textfield" name = "question_text" placeholder="Question?"  size = "80"/>
			</p>
			
			<p>
				<b><label> Choice 1: </label></b><br>
				<input type = "text" name = "choice1" placeholder="Option1" size = "80"/>
			</p>
			
			<p>
				<b><label> Choice 2: </label></b><br>
				<input type = "text" name = "choice2" placeholder="Option2" size = "80"/>
			</p>

			<p>	
				<b><label> Choice 3: </label></b><br>
				<input type = "text" name = "choice3" placeholder="Option3" size = "80"/>
			</p>

			<p>
				<b><label> Choice 4: </label></b><br>
				<input type = "text" name = "choice4" placeholder="Option4" size = "80"/>
			</p>
			
			<p>
				<b><label> Correct Option Number </label></b><br>
				<input type = "number" name = "correct_choice" >
			</p>
			
				<input type = "reset" value = "CLEAR" style = "background-color:black;color:white; width:90px;height:30px;"/>
				<input type = "submit" name= "submit" value = "SUBMIT" style = "background-color:black;color:white; width:90px;height:30px;"/>
		</div>		
		
	</div>


	<div id="assignment" class="tabcontent">
	  <h3>Create Assignment</h3>
	  
		<input type = "textfield" name = "Questn1" placeholder="Questn 1?" size = "80"/>2Marks<br><br>
			<!--<textarea rows="4" cols="82"> Answer1. </textarea><br><br>-->
			
		<input type = "textfield" name = "Questn2" placeholder="Questn 2?" size = "80"/>2Marks<br><br>
			<!--<textarea rows="4" cols="82"> Answer2. </textarea><br><br>-->

		<input type = "textfield" name = "Questn3" placeholder="Questn 3?" size = "80"/>2Marks<br><br>
			<!--<textarea rows="4" cols="82"> Answer3. </textarea><br><br>-->

		<input type = "textfield" name = "Questn4" placeholder="Questn 4?" size = "80"/>2Marks<br><br>
			<!--<textarea rows="4" cols="82"> Answer4. </textarea><br><br>-->

			<input type = "reset" value = "CLEAR" style = "background-color:black;color:white; width:90px;height:30px;"/>
			<input type = "submit" name = "submit" value = "SUBMIT" style = "background-color:black;color:white; width:90px;height:30px;"/>
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
		
	<!-- This section for Video for (Select Video source from source file)-->
	function selectedVideo(self){
		var file = self.files[0];
		var reader = new FileReader();
		
		reader.onload = function(e){
			var src = e.target.result;
			var video = document.getElementById("video");
			var source = document.getElementById("source");
			
			source.setAttribute("src", src);
			video.load();
			video.play();
		};
		
		reader.readAsDataURL(file);
	}
		
	
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