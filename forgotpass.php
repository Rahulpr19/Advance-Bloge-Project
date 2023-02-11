<?php include('server.php')
      
 ?>

<?php
     include "include/header.php";
     include "include/navbar.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	 <link rel="stylesheet" type="text/css" href="css/stylelg.css">

	 <!-------------------------- You Are provide to login------------------------------>
  <center>
    <h1>Reset Your Password</h1>
    <b>(Create Your New Password)</b>
  </center>  
<br>

<div class="row" style="margin-right: 0px !important;margin-left: 0px !important;">
  <div class="col-lg-4 col-md-3 col-12">

<!---------------------Side bar---------------------------->
  <?php
     include "sidebar.php";
 ?>

<!-------------------Form page-------------------------------->
<div class="col-lg-4 col-md-3 col-12">     
<form method="post" action="forgot.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Old-Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New-Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm-Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_2">
  </div>
  <center><button type="submit" class="btn3" name="reg_user">Reset Password</button></center>
</form>
</div>


<br><br><br><br><br><br><br>
 <?php 
  include "includehome/footer.php";
 ?>
</head>
</html>

