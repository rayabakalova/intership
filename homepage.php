<?php require_once 'include/head.php';?>
<body>
	<div id="main-wrapper" class="text-center">
		<h1>Технически университет - София</h1><hr>
		<h2 id="welcome">Здравейте, <?php echo $_SESSION['username']; ?></h2>
			
		<div class="imgcontainer col-md-12">
			<img src="assets/images/student.png" alt="Avatar" class="avatar">
		</div>
	
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
                        <h3>Студентски стажове 2017</h3>
                        <p>Стажът е възможност за студентите да придобият опит и практически умения в конкретна среда по време на следването си. Стажът е начин за създаване на контакти, средство за натрупване на увереност, първа стъпка в твоята кариера. <br />
                        По време на стажа <br />
						Постарай се да получиш колкото се може повече полезни знания и умения, постоянно търси начини да научиш повече. Бъди активен – участвай в срещите, води си записки, задавай въпроси, прави предложения.</p>                      
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>