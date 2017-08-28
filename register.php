<?php require_once 'include/head.php';?>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Регистрация</h2></center>
	<div class="imgcontainer col-md-12 text-center">
			<img src="assets/images/avatar.png" alt="Avatar" class="avatar col-md-4 col-md-offset-4	" width="100%">
		</div>
		<div class="clearfix"></div>
	
		<?php			
			if(isset($_POST['register'])) {
				if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['cpassword'])) {
					echo 'Моля, попълнете всички полета!';
				} else {
					userExists($_POST['username']);
					if(!userExists($_POST['username'])) {
						echo '<div class="alert alert-danger text-center">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			                    ×</button>
			               <span class="glyphicon glyphicon-remove"></span>
			                <hr class="message-inner-separator">
			                <p>
			                    Съществува потребител с тези данни!Моля, въведете различно потребителско име!</p>
			            </div>';
					} else {
						newUser($_POST['username'], $_POST['password']);
						header('Refresh: 3; url=index.php');
						echo '<div class="alert alert-success text-center">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				                    ×</button>
				               <span class="glyphicon glyphicon-ok"></span>
				                <hr class="message-inner-separator">
				                <p>
				                    Успешна регистрация!</p>
				            </div>';
					}
					

				}
			}
		?>
		<form action="register.php" method="post">
			
			<div class="inner_container">
				<div class="form-group">
					<label><b>Потребителско име:</b></label>
					<input type="text" placeholder="Въведете потребителско име" name="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label><b>Парола:</b></label>
					<input type="password" placeholder="Въведете парола" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label><b>Повторете паролата:</b></label>
					<input type="password" placeholder="Повторете паролата" name="cpassword" class="form-control" required>
				</div>
				<div class="form-group">
					<button name="register" class="sign_up_btn" type="submit">Регистрация</button>				
					<a href="index.php"><button type="button" class="back_btn"><< Назад</button></a>
				</div>
			</div>
		</form>
		
		
	</div>
<?php require_once 'include/footer.php'; ?>
<?php require_once 'include/bottom-js.php';?>