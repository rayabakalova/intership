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
								deleteFirm('business', $_POST);
                                
							}
						      
                            $list_firm = firmListData();
                           
                            
                            
						?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Изберете фирма:</label>
                                <select name="firm" id="firm" class="form-control">
                                  <?php if($list_firm): foreach($list_firm as $key => $firm): ?>

                                    <option value="<?php echo $firm['id']; ?>"><?php echo $firm['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                               
                            </div>

                            
                            </div>
                            <div class="clearfix" style="padding: 10px"></div>
                         
                    
                          
                          <button type="submit" name="addFirm" class="btn btn-primary">Изтрий</button>
                        </form>       
                       
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>