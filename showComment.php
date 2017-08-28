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


                            
                   
                            $list_firms = facStudentListData();

                            if (isset($_POST['showComment'])) {
                                showComment('comments', $_POST);
                                
                               
                                
                            }

                             $username = showComment('comments', $_POST);
                                                        
                        ?>
                        <form action="" method="post" class="col-md-12 col-xs-12">
                            

                             <div class="form-group" id="firms">
                                <label for="exampleInputEmail1">Избери фирма: </label>
                                <select name="firm" id="spec" class="form-control">
                                  <?php if($list_firms): foreach($list_firms as $key => $firm): ?>

                                    <option value="<?php echo $firm['id']; ?>"><?php echo $firm['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                               <button type="submit" name="showComment" class="btn btn-primary" >Прочети коментарите</button>
                               <div class="col-md-12" >
                               <?php
                           

                               $list_comments = showComment('comments', $_POST);   
                              if (!empty($list_comments)) {
                                    foreach ($list_comments as $value) {
                                      echo '<form action="" method="" class="col-md-12 col-xs-12" style="padding: 10px 0px;">
                                              <div class="col-md-10 col-md-offset-1 text-right" >
                                                <div class="col-md-6">
                                                    <h3>'.$username.'</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <i>'.$value['date_time'].'</i>  
                                                </div>                                            
                                              </div>
                                              <div class="col-md-10 col-md-offset-1" style="border: 1px solid; border-color: #eee; padding: 10px; text-align: left; border-radius: 5px"> 
                                                   '.$value['comment'].'                                             
                                              </div>

                                             
                                          </form>';
                                    }
                                  }
                                   else {
                                    echo "Няма коментари за тази фирма!";
                                    
                                   }

                                       
                                                
                                            ?>
                                        </div>
                            </div>
                              </form>       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showCom() {
        document.getElementById("show").style.display = 'block';
        return false;
    }
</script>
<?php require_once 'include/footer.php';?>  
<?php require_once 'include/bottom-js.php';?>
