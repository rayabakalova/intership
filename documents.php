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
						            <div class="col-md-12 col-xs-12 col-sm-12 text-center">
                            <h3>Декларации:</h3>
                            <div class="col-md-12">
                              <a href="customFirm.php" class="btn btn-primary" id="docs">Служебна бележка за избрана от студента фирма</a><br />
                              <a href="report.php" class="btn btn-primary" id="docs">Отчет на дейността по време на стажа</a><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>