<?php require_once 'include/head.php';?>
<body>
	<div id="main-wrapper" class="text-center">
		<h1>Технически университет - София</h1><hr>
	
		<div id="wrapper">
        <div class="overlay"></div>
    
       <?php require_once 'include/nav.php';?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h3>Студентски стажове 2017</h3>
						            <?php
                            userExists($_POST['username']);
                            if(!userExists($_POST['username'])) {

                               $list_users = userListData();   
                               if (!empty($list_users)) {
                                  foreach ($list_users as $key => $user) {
                                     echo '<form action="" method="" class="col-md-12 col-xs-12">
                                              <div class="form-group">
                                                    <label for="exampleInputEmail1">Име:</label>
                                                    <input type="text" class="form-control" name="name" value="'.$user['name'].'">                                              
                                              </div>

                                              <div class="form-group">
                                                    <label for="exampleInputEmail1">Email адрес:</label>
                                                    <input type="text" class="form-control" value="'.$user['email'].'">                                              
                                              </div>
                                             <div class="form-group">
                                                  <label for="exampleInputEmail1">Телефон:</label>
                                                  <input type="number" class="form-control" value="'.$user['phone'].'">
                                              </div>
                                               <div class="form-group">
                                                  <label for="exampleInputEmail1">Курс:</label>
                                                  <input type="number" class="form-control" value="'.$user['course'].'">
                                              </div>
                                               <div class="form-group">
                                                  <label for="exampleInputEmail1">Факултетен номер:</label>
                                                  <input type="number" class="form-control" value="'.$user['fac_num'].'">
                                              </div>
                                          
                                          </form>';
                                    }

                                    $user_fac = selectUserFac();
                                    if (!empty($user_fac)) {
                                      foreach ($user_fac as $key => $value) {
                                         echo '<div class="form-group">
                                                <label for="exampleInputEmail1">Факултет:</label>
                                                <input class="form-control" value="'.$value['name'].'" disabled="disabled">
                                            </div>';
                                      }
                                     
                                    }

                                    $user_spec = selectUserSpec();
                                    if (!empty($user_spec)) {
                                      foreach ($user_spec as $key => $value2) {
                                         echo '<div class="form-group">
                                                <label for="exampleInputEmail1">Специалност:</label>
                                                <input class="form-control" value="'.$value2['name'].'" disabled="disabled">
                                            </div>';
                                      }
                                     
                                    }
                                    
                               }
                               else {
                                header('Location: info.php');
                               }                                                     


                            
                            } else {

                                    newUser($_POST['username'], $_POST['password']);
                                    header('Refresh: 3; url=index.php');
                                    echo '<div class="alert alert-success text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <span class="glyphicon glyphicon-ok"></span>
                                            <hr class="message-inner-separator">
                                            <p>Успешна регистрация!</p>
                                        </div>';
                                  }

                    							if(isset($_POST['add'])) {
                    								userInsertData('users_data', $_POST);

                    							}
                                  
                    						    $list_fac = facListData();
                                    $list_spec = specListData();
                                    $list_firms = firmListData();
                                                
                                                
                    						?>
                                
                              </div>
                          </div>
                      </div>
                  </div>
          	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>