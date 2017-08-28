<?php require_once 'include/head.php';?>
<body>
	<div id="main-wrapper" class="text-center">
		<h1>Технически университет - София</h1><hr>
	
		<div id="wrapper">
        <div class="overlay"></div>
    
       <?php require_once 'include/nav.php';?>

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
    						if(isset($_POST['saveDesc'])) {
                                addInterDesc($_POST);
    							if(empty($_POST['first']) || empty($_POST['second'])) {
    								echo 'Моля, попълнете всички полета!';
    							} else {
    								
    								echo '<div class="alert alert-success">
    						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
    						                    ×</button>
    						               <span class="glyphicon glyphicon-ok"></span>
    						                <hr class="message-inner-separator">
    						                <p>
    						                    Успешно добавихте описание!</p>
    						            </div>';

    							}
    						}
						?>
                        <form action="" method="post">
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Първа седмица:</label>
                                <textarea rows="4" cols="50" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Втора седмица:</label>
                                <textarea rows="4" cols="50" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="second"></textarea>
                            </div>
                            
                            <div class="clearfix" style="padding: 10px"></div>                
                          
                          <button type="submit" name="saveDesc" class="btn btn-primary">Запази</button>
                        </form>       
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>