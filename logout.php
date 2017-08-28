<?php 
require_once 'dbconfig/config.php';
logoutAuth();
header("Location: index.php");
?>