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
                        <div class="col-md-3 col-md-offset-10 comments" id="container">
                            <a href="showComment.php">Виж коментари за фирмите</a>
                        </div>


                        <?php


                            if(isset($_POST['add'])) {
                                insertCustomFirm('business', $_POST);
                                updateCustomFirm('users_data', $_POST);
                            }

                            if (isset($_POST['save'])) {
                                insertFirm('users_data', $_POST);

                                
                            }
                   
                            $list_firms = facStudentListData();                                                       
                        ?>
                        <form action="" method="post" class="col-md-12 col-xs-12">
                             <div class="form-group" id="firms">
                                <label for="exampleInputEmail1">Избери фирма: </label>
                                <select name="firm" id="spec" class="form-control">
                                  <?php if($list_firms): foreach($list_firms as $key => $firm): ?>

                                    <option value="<?php echo $firm['id']; ?>"><?php echo $firm['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                            </div>
                             <div class="form-group" id="firms">
                                <label for="exampleInputEmail1">Избери позиция: </label>
                                <select name="firm_pos" id="spec" class="form-control">
                                  <?php if($list_pos_firms): foreach($list_pos_firms as $key => $firm_pos): ?>

                                    <option value="<?php echo $firm_pos['id']; ?>"><?php echo $firm_pos['name']; ?></option>

                                  <?php endforeach; endif; ?>
                                </select>
                               
                            </div>
                            <div class="form-group">
                                <input id="button"  type="button" value="Добави своя фирма" class="btn btn-default col-md-12" style="margin-left: 6px; margin-bottom: 10px">
                                <br>
                                <div id="fname" hidden>
                                  <input type="text" class="form-control" placeholder="Име на фирмата" name="fname" />
                                </div>
                                <br>
                                <div id="pos" hidden>
                                  <input type="text" class="form-control" placeholder="Позиция" name="customPos" />
                                </div>
                                <br>
                                <div id="mentor" hidden>
                                  <input type="text" class="form-control" placeholder="Отговарящ за студента във фирмата" name="firmm" />
                                </div>
                                <br>
                                 <div id="uni" hidden>
                                  <input type="text" class="form-control" placeholder="Отговарящ за студента в университета" name="unim" />
                                </div>
                                <div id="add-btn" hidden>
                                    <button type="submit" name="add" class="btn btn-primary">Добави</button>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>                   
                          
                          <button type="submit" name="save" class="btn btn-primary" id="save">Запази</button>
                        </form>       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    setTimeout(function(){
        document.getElementById('container').style = '-webkit-transform:scale(1) rotate(360deg);';
    },1000);
     
    setTimeout(function(){
        document.getElementById('container').style = '-webkit-animation : kf_scale 1s';
    },1000);
</script>
<?php require_once 'include/footer.php';?>  
<?php require_once 'include/bottom-js.php';?>
