<?php
session_start();

	include("connect.php");
	include("func.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//Something was posted
	$client_name= $_POST['client_name'];
	$client_email= $_POST['client_email'];
	
if(!empty($client_name) && !empty($client_email))
{
	//save to database
	$client_id = random_num(20);
	$query = "insert into tbl_client(client_id, client_name, client_email) values('$client_id', '$client_name', '$client_email')";

	// execute database amd redirect to login page

	$res= mysqli_query($conn, $query);

	
 //data insertion confirmation
 if($res==TRUE)
 {
	 //Data successfully recorded!
	 //echo "Data successfully recorded!";
	 // create session variable

	 $_SESSION['add'] = "You are Now Subscribed! Welcome to CentroIQ!";

	 //redirect page

	 header("location: login.php");
 }
 else
 { 
	 //Failed Attempt!  
	 //echo "Failed Attempt!";

		// create session variable

		$_SESSION['add'] = "Failed to Subscribe, Please Try again!";

		//redirect page to Add admin

		header("location: signup.php");
 }

	die;
}

}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Subscribe</title>
	  <link rel="stylesheet" href="qrui.css">
</head>

<body>
	
<div class="login">

<h1>Subscribe Here!</h1>

	<form action="" method="post">
		<div style="font-size: 20px; margin: 10px;"></div>
<table>
		Name: <br />
		<input type="text" name="client_name" placeholder="Enter your name.."><br /><br />
		Email: <br />
		<input type="email" name="client_email" placeholder="Enter Email.."><br /><br />
		
		<input type="submit" name="submit" value="Next" class="btn-primary">
		<br /><br />
			
		<a href="mssg.php">Message us here if you are already Subscribed</a><br><br>
	</form>
</div>
</body>
</html>