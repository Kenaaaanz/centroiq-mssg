<?php
session_start();

	include("connect.php");
	include("func.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//Something was posted
	$client_email= $_POST['client_email'];

if(!empty($client_email))
{
	//read from database
	$query = "select * from tbl_client where client_email = '$client_email' limit 1";

	$result= mysqli_query($conn, $query);

	if($result)
	{
		if($result && mysqli_num_rows($result)> 0)
		{
			$user_data= mysqli_fetch_assoc($result);
			if($user_data['client_email'] === $client_email)
			{
				$_SESSION['client_id'] = $user_data['client_id'];
				header("location: mssg.php");
				die;
			}	
			
		}
	}
	echo "please Subscribe first to get our services";
}else
{
	echo "Wrong Username or Password";
}
}






?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	 <link rel="stylesheet" href="qrui.css">
</head>

<body>
	
<div class="login">

		<h1>Login</h1>

<br /><br />

<?php

if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

	?>

		
	 <!--login form-->
	 <form action="" method="POST" class="text-center">

		Email Address: <br />
		<input type="text" name="client_email" placeholder="Enter email"><br /><br />
		

		<input type="submit" name="submit" value="Login" class="btn-primary">

		<br /><br />

		</form>

			<a href="signup.php">Subscribe!</a><br><br>
	</form>
</div>
</body>
</html>