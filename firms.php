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
                            

                               $firm_list = firmListData();   
                               if (!empty($firm_list)) {
                                  foreach ($firm_list as $key => $firm) {
                                     echo '<form action="" method="" class="col-md-12 col-xs-12">
                                              <div class="form-group">
                                                    <label for="exampleInputEmail1">'.$firm['name'].':</label>
                                                   <textarea rows="10" cols="50" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description">"'.$firm['description'].'"</textarea>                                             
                                              </div>

                                             
                                          </form>';
                                    }
                                    echo '<a href="chooseFirm.php" class="btn btn-primary">Избери фирма</a>';
                            } else {                                   
                                    echo '<div class="alert alert-info text-center">                                            
                                            <p>Няма добавени фирми!</p>
                                        </div>';
                                  }

                    							
                    						?>
                                
                              </div>
                          </div>
                      </div>
                  </div>
          	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>