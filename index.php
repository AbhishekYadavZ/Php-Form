<?php
$insert = false;
if(isset($_POST['name'])){

	// Set connection variables
	$server = 'localhost';
	$username = "root";
	$password = "";

	//create a connections
	$con = mysqli_connect($server,$username,$password);

	if(!$con){
		die("connection to this database failed due to".mysqli_connect_error());
	}
	// echo "Success Connection to db"


	//collect post varibles
	$name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$desc = $_POST['desc'];

	$sql = "INSERT INTO `trip`.`trip` ( `name`, `email`, `age`, `gender`, `phone`, `desc`, `dt`) VALUES ('$name', '$email', '$age', '$gender', '$phone', '$desc', current_timestamp());";

	//echo $sql;

	//execute the query

	if($con->query($sql) == true){
		//echo "Successfully Inserted";

		//flag for successfull insertion
		$insert = true;
	}
	else{
		echo "ERROR: $sql <br> $con->error";
	}

	//close the database connection
	$con->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Travel Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<img class="bg" src="bg.jpg" alt="IIIT Sonepat">
	
	<div class="container">
		<h1>Welcome to IIIT Sonepat US Trip Form</h1>
		<p>Enter Your Details to confirm your participation in the Trip</p>
		<?php 
		if($insert == true)
		{
			echo " <p class='submitMsg'> Thanks for submitting your form. We are happy to see you joing us for US trip.</p>";
		}
		
		?>

		<form action="index.php" method="post">
			<input type="text" name="name" id="name" placeholder="Enter Your Name">
			<input type="email" name="email" id="email" placeholder="Enter Your Email">
			<input type="text" name="age" id="age" placeholder="Enter Your Age">
			<input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
			<input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
			<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other Information"></textarea>
			<button class="btn">Submit</button>
			
		</form>
	</div>

	<script type="text/javascript" src="script.js"></script>

	<!-- 
		
	-->
</body>
</html>