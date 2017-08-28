<?php require_once 'include/head.php';?>
<body style="background-color:#bdc3c7">

	<div id="main-wrapper">
		<div class="imgcontainer col-md-12 text-center">
			<img src="assets/images/avatar.png" alt="Avatar" class="avatar col-md-4 col-md-offset-4	" width="100%">
		</div>
		<form action="index.php" method="post">
			<div class="form-group">			   
			 	<label><b>Потребителско име:</b></label>
				<input type="text" class="form-control" placeholder="Въведете потребителско име" name="username" required> 			   
			 </div>

			 <div class="form-group">
			 	<label><b>Парола:</b></label><br />
				<input type="password" placeholder="Въведете парола" class="form-control" name="password" required>
			 </div>
				
			 <div class="form-group">
			 	<button class="login_button" name="login" type="submit">Вход</button>
			 </div>

			 <div class="form-group">
			 	<a href="register.php"><button type="button" class="register_btn">Регистрация</button></a>
			 </div>		
		</form>
		
		<?php
			if(isset($_POST['login'])) {
				echo $confirm = confirmUser($_POST['username'], $_POST['password']);
				if(true == $confirm) {
					echo $role = getUserRole($_POST['username'], $_POST['password']);
					if(0 == $role) {
						header('Location: userInfo.php');
					}
					if(1 == $role) {
						header('Location: admin.php');
					}
				}
			}

			/*if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$role=$_POST['role'];

			
				$query = "select * from users where username LIKE '$username' and '".md5($password)."'";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					session_regenerate_id();
					$_SESSION['username'] = $row['username'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['role'] = $row['role'];
					

					if ($_SESSION['role'] == '1') {
						header("Location: admin.php");
					}
					else {
						header("Location: homepage.php");
					}


					

					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}*/
		?>
		
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>