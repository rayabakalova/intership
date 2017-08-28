<?php require_once 'include/head.php';?>
<body>
 <?php 
    if (!empty($_POST["id"])) {
       $id = $_POST['id'];
       $query = "SELECT * FROM faculty_pos WHERE firm_id = '".$id."'";
       
    }
 ?>
<?php require_once 'include/bottom-js.php';?>
<?php require_once 'include/footer.php';?>