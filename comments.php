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
                           

							if(isset($_POST['comment'])) {
								
                                addComment('comments', $_POST);
							}
						      
                            $list_firms = firmListData();
                            
                           
						?>

						<?php			
						if(isset($_POST['addFirm'])) {
							if(empty($_POST['comment']) || empty($_POST['firm'])) {
								echo 'Моля, попълнете всички полета!';
							} else {
								
								echo '<div class="alert alert-success">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						                    ×</button>
						               <span class="glyphicon glyphicon-ok"></span>
						                <hr class="message-inner-separator">
						                <p>
						                    Успешно добавихте коментар!</p>
						            </div>';

							}
						}
						?>
                        <form action="" method="post">
                             <div class="form-group" id="firms">
                                <label for="exampleInputEmail1">Избери фирма: </label>
                                <select name="firm" id="firmID" class="form-control" onchange="getID()">
                                  <?php if($list_firms): foreach($list_firms as $key => $firm): ?>

                                    <option value="<?php echo $firm['id']; ?>"><?php echo $firm['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Коментар:</label>
                                <textarea rows="4" cols="50" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="comment" placeholder="Описание на дейността"></textarea>
                            </div>       
                           

                               
                            
                            <div class="clearfix" style="padding: 10px"></div>
                         
                    
                          
                          <button type="submit" name="addFirm" class="btn btn-primary">Добави коментар</button>
                        </form>       
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>