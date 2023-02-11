<?php include('db.php') ?>
<?php 
	include "includehome/header-home.php";
    include "includehome/home-navbar.php";
 ?>

 <?php if (isset($_SESSION['success'])): ?>
<?php 
   echo $_SESSION['success'];
   unset($_SESSION['success']);
 ?>
<?php endif ?>