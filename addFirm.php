<?php require_once 'include/head.php';?>
<body>
	<div id="main-wrapper" class="text-center">
		<h1>Технически университет - София</h1><hr>
	
		<div id="wrapper">
        <div class="overlay"></div>
    
       <?php require_once 'include/nav-admin.php';?>

        <!-- Page Content -->
        <div id="page-content-wrapper" style="padding: 0">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Студентски стажове 2017</h3>
						<?php
                           

							if(isset($_POST['addFirm'])) {
								
                                addPosition('faculty_pos', $_POST);
                                posID($_POST);                                
                                addFirm('business', $_POST);
                                firmPosition('pos_firm', $_POST);
							}
						      
                            $list_fac = facListData();
                            $list_spec = specListData();
                           
						?>

						<?php			
						if(isset($_POST['addFirm'])) {
							if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['position']) || empty($_POST['fac']) || empty($_POST['spec'])) {
								echo 'Моля, попълнете всички полета!';
							} else {
								
								echo '<div class="alert alert-success">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						                    ×</button>
						               <span class="glyphicon glyphicon-ok"></span>
						                <hr class="message-inner-separator">
						                <p>
						                    Успешно добавихте фирма!</p>
						            </div>';

							}
						}
						?>
                        <form action="" method="post">
                             <div class="form-group">
                                <label for="exampleInputEmail1">Име на фирма:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Име на фирмата">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание:</label>
                                <textarea rows="4" cols="50" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description" placeholder="Описание на дейността"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Позиция на стажанта:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="position" placeholder="Позиция">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Факултет:</label>
                                <select name="fac[]" id="fac" class="form-control" multiple="">
                                  <?php if($list_fac): foreach($list_fac as $key => $fac): ?>

                                    <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                               
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Специалност:</label>
                                <select name="spec[]" id="spec" class="form-control" multiple="" style="height: 200px">
                                  <?php if($list_spec): foreach($list_spec as $key => $spec): ?>

                                    <option value="<?php echo $spec['id']; ?>"><?php echo $spec['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                               
                            </div>


                               
                            </div>
                            <div class="clearfix" style="padding: 10px"></div>
                         
                    
                          
                          <button type="submit" name="addFirm" class="btn btn-primary">Запази</button>
                        </form>       
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>