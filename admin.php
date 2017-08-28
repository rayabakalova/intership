<?php require_once 'include/head.php';?>
<body>
    <?php session(); ?>
    <?php session_admin(); ?>
	<div id="main-wrapper" class="text-center">
		<h1>Технически университет - София</h1><hr>
		<h2 id="welcome">Здравейте, <?php echo $_SESSION['username']; ?></h2>

		<div id="wrapper">
        <div class="overlay"></div>
        <div class="text-left">
             <?php require_once 'include/nav-admin.php';?>
        </div>
       

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
                        <h3>Студентски стажове 2017</h3>
                        <p>За да продължите изберете опция от менюто</p>                      
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>