<?php require_once 'include/head.php';?>

<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Регистрация на администратор</h2></center>
	<div id="wrapper">
        <div class="overlay"></div>
    
       <?php require_once 'include/nav-admin.php';?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
        </div>
		<?php

			
			if(isset($_POST['registerAdmin'])) {
				if(empty($_POST['username']) || empty($_POST['password'])) {
					echo 'fill the fields';
				} else if($_POST['password'] !== $_POST['cpassword']) {
					echo 'password do not match';

				} else {
					newAdmin($_POST['username'], $_POST['password']);
					header('Refresh: 2; url=admin.php');
					echo '<div class="alert alert-success alert-dismissable text-center fade in">
						  <strong>Успешна регистрация!</strong>
						</div>';

				}
			}
		?>
	
		<form action="addAdmin.php" method="post">
			
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
					<button name="registerAdmin" class="sign_up_btn" type="submit">Регистрация</button>				
					
				</div>
			</div>
		</form>
		
		
	</div>
	<?php require_once 'include/footer.php';?>
	<?php require_once 'include/bottom-js.php';?>