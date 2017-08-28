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
                    <div class="col-lg-8 col-lg-offset-2">
                        <h3>Избери дата за провеждане на стаж:</h3>
                        <?php


                            if(isset($_POST['submit'])) {
                                
                                insertDate('users_data', $_POST);
                            }

                           
                                                        
                        ?>
                        
                     <div class="bootstrap-iso">
                         <div class="container-fluid">
                          <div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">

                            <!-- Form code begins -->
                            <form method="post">
                              <div class="form-group col-md-6"> <!-- Date input -->
                                <label class="control-label" for="date">Начало на стажа:</label>
                                <input class="form-control" id="date" name="from" placeholder="MM/DD/YYY" type="text"/>
                              </div>
                              <div class="form-group col-md-6"> <!-- Date input -->
                                <label class="control-label" for="date">Край на стажа:</label>
                                <input class="form-control" id="date" name="to" placeholder="MM/DD/YYY" type="text"/>
                              </div>
                              <div class="form-group"> <!-- Submit button -->
                                <button class="btn btn-primary " name="submit" type="submit">Запази</button>
                              </div>
                             </form>
                             <!-- Form code ends --> 

                            </div>
                          </div>    
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>