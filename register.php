<?php
	require_once 'dbconfig/config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div id="main-wrapper">
		<h2>Registration form</h2>
		<img src="assets/images/user.jpg" class="avatar">

		<form action="register.php" method="post" class="myForm">
		<label>Username: </label>
		<input type="text" name="username" class="inputvalues" required="">

		<label>Password: </label>
		<input type="text" name="password" class="inputvalues" required="">

		<label>Confirm password: </label>
		<input type="text" name="cpassword" class="inputvalues" required="">

		<input type="submit" id="signup_btn" name="submit_btn" value="Sing up">
		<input type="button" id="back_btn" name="back_btn" value="<< Back">
	</form>

	<?php 
		if (isset($_POST['submit_btn'])) 
		{
			echo '<script type="text/javascript"> alert("Sign up button clicked!")</script>';

			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];

			if($password == $cpassword) 
			{
				$query = "SELECT * FROM users WHERE username = '$username'";
				$query_run = mysqli_query($con, $query);

				
				if (mysqli_num_rows($query_run)>0) 
				{
					//there is already a user with the same username

					echo '<script type="text/javascript"> alert("User already exist. Try another username!")</script>';
				}

				{
					$query = "INSERT INTO users VALUES ('$username', '$password')";
					$query_run = mysqli_query($con, $query);

					if ($query_run) 
					{
						echo '<script> alert("User Registered!")</script>';
					}
					
				}
				

				
			}
			else 
			{
				echo '<script> alert("Password does not match!")</script>';
			}
		}
	?>

	</div>

</body>
</html>