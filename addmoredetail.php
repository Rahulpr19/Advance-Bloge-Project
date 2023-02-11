<?php include('server.php') ?>

<?php
     include "includehome/header-home.php";
     include "includehome/home-navbar.php"; 
 ?>

<head>
<style>
    body{
      font-family: Palatino Linotype;
    }
</style>
</head>

 <?php

 if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
  }
 ?>
<div style="background: #f44336; padding: 40px 40px;">
  <h1 class="text-center" style="margin-top: 0px;">Add More Details</h1>
    <h4 class="text-center">(Welcome to your Profile page)</h4><br>
<!--------------Display Name------------------>
<form method="POST" action="profileadddb.php">
<div class="row" style="background: white; padding: 30px;">
  <?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          ?>

<div class="col-lg-6">
    <div class="form-group">
          <label> Username:</label>
           <span class="form-control text-uppercase"><?php echo $row['username'];  ?></span>
        </div>

        <div class="form-group">
          <label> Email Id:</label>
            <?php echo "<input type=text name= email id= comment_id class=form-control value='".$row['email']."'>"; ?>
        </div>
        <div class="form-group">
          <label> Mobile No.:</label>
          <span class="form-control"><?php echo $row['MobileNo'];  ?></span>
        </div>

    <div class="form-group">
    	<label for="exampleInputLocation">Location</label>
    		<input type="text" class="form-control" id="exampleInputLocation" aria-describedby="LocationHelp" placeholder="Enter Location" name="location">
   	</div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label for="exampleInputPinCode">PinCode</label>
    <input type="number" class="form-control" id="exampleInputPinCode" aria-describedby="PinCodeHelp" placeholder="Enter PinCode" name="pincode">
  </div>
  <div class="form-group">
    <label for="exampleInputdate">D.O.B</label>
    <input type="date" class="form-control" id="exampleInputdate" aria-describedby="calanderHelp" placeholder="yyyy-mm-dd" name="birth">
  </div>
  <div class="form-group">
    <label for="exampleInputInstitute">Institute</label>
    <input type="text" class="form-control" id="exampleInputInstitute" aria-describedby="InstituteHelp" placeholder="Enter Institute" name="institute">
  </div>
  <div class="form-group">
    <label for="exampleInputtext">Bio</label>
    <textarea rows="1" type="text" class="form-control" id="exampleInputtext" aria-describedby="BioHelp" placeholder="Enter Bio" name="bio"></textarea>
  </div>
</div>
</div><br>
<div class="form-group" style="margin-bottom: 0px;">
	<center><input type="submit" value="Add" name="submit_add" style="padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius: 5px; color: #fff; text-decoration:none;" >
<a href="profileinfo.php" style="padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius: 5px; color: #fff; text-decoration:none;">Profile Info</a>
	</center>
</div>
</form>
</div>


</div>
<?php 
  include "includehome/footer.php";
 ?>


