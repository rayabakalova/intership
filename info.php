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


							if(isset($_POST['add'])) {
								userInsertData('users_data', $_POST);
                 echo '<div class="alert alert-success text-center">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <span class="glyphicon glyphicon-ok"></span>
                          <hr class="message-inner-separator">
                          <p>Успешна регистрация!</p>
                      </div>';

							}
						    $list_fac = facListData();
                $list_spec = specListData();
                $list_firms = firmListData();
                            
                            
						?>
                        <form action="" method="post" class="col-md-12 col-xs-12">
                             <div class="form-group">
                                <label for="exampleInputEmail1">Име: *</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Име, презиме, фамилия">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email адрес: *</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email адрес">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Телефон: *</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" placeholder="Телефон">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Курс: *</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="course" placeholder="Курс">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Факултетен номер: *</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fac_num" placeholder="Факултетен номер">
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Факултет: *</label>
                                <select name="fac" id="fac" class="form-control">
                                  <?php if($list_fac): foreach($list_fac as $key => $fac): ?>

                                    <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                               
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Специалност: *</label>
                                <select name="spec" id="spec" class="form-control">
                                  <?php if($list_spec): foreach($list_spec as $key => $spec): ?>

                                    <option value="<?php echo $spec['id']; ?>"><?php echo $spec['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                               
                            </div>
                            <div class="clearfix" style="padding: 10px"></div>                   
                          
                          <button type="submit" name="add" class="btn btn-primary">Запази</button>
                        </form>       
                       
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>