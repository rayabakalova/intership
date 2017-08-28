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
                             $showForm = false;
                             
                             if(isset($_POST['send-request'])) {
                              $name = $_POST['name'];
                              $email = $_POST['email'];
                              $message = $_POST['message'];
                              
                              if(empty($name) || empty($email) || empty($message)) {
                               echo 'Моля, попълнете полетата!', 'error';
                              } else if(!preg_match('/@/', $email)) {
                               echo 'Моля, въведете валиден e-mail!', 'error';
                              } else {
                               
                               $sendToEmail = 'raia_f@abv.bg'; //До кого да изпраща съобщенията!
                               
                               $sendMailSubject = 'Запитване от Технически университет София';
                                
                               $sendMailMessage = '';
                               $sendMailMessage .= "Лице за контакти: " . $name . " <br /> ";
                               $sendMailMessage .= "E-mail: " . $email . " <br /> ";
                               $sendMailMessage .= "Съобщение: " . $message ;
                                
                               $sendMailNow = @mail($sendToEmail, $sendMailSubject, $sendMailMessage, 
                                "Content-type: text/html; charset=UTF-8\r\n".
                                "From: " . $name . " E-Mail: " . " <" . $email . ">\r\n"
                                . "Reply-To: " . $email . "\r\n"
                                . "X-Mailer: PHP/" . phpversion()
                               );
                                
                               if($sendMailNow) {
                                $showForm = true;
                                 
                                echo 'Съобщението е изпратено успешно! Очаквайте отговор в най-кратки срокове!';
                               } else {
                                echo 'Грешка при изпращане на съобщението!';
                               }
                              }
                             }
                            ?>
                            <div class="clearfix"></div>
                            <?php if($showForm != true) { ?>
                             <form method="post" action="" class="col-md-10 col-md-offset-1">
                             <div class="col-md-12 col-xs-12 col-sm-12">
                              <div class="form-group">
                               <input name="name" type="text" class="form-control contact-input" placeholder="Вашето име" />
                              </div>
                             </div>
                             
                             <div class="col-md-12 col-xs-12 col-sm-12">
                              <div class="form-group">
                               <input name="email" type="text" class="form-control contact-input" placeholder="Вашият email" />
                              </div>
                             </div>
                             
                             <div class="clearfix"></div>
                             
                            <div class="col-md-12 col-xs-12 col-sm-12">
                              <div class="form-group">
                               <textarea name="message" rows="5" cols="5" class="form-control contact-input" placeholder="Запитване..."></textarea>
                              </div>
                             </div>
                             
                             <div class="clearfix"></div>
                             
                             <div class="col-md-4 col-md-offset-4 col-xs-12 col-sm-12">
                              <div class="form-group">
                               <input name="send-request" type="submit" class="form-control contact-button btn-primary" style="color: #fff; font-size: 14pt; padding: 0" value="Изпрати" />
                              </div>
                             </div>
                            </form>
                            <?php } ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php';?>  
<?php require_once 'include/bottom-js.php';?>
