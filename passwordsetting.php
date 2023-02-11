<?php
     include "includehome/header-home.php";
     include "includehome/home-navbar.php"; 
 ?>
 <?php include('server.php') ?>
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
<head>
  <style>
    body{
      font-family: Palatino Linotype;
    }
    .bg{
      background-color: green !important;
      color: #fff !important;
      padding: 8px 17px;
      margin-bottom: 10px;
      width: 25%;
      border-radius: 30px;
      text-align: center;
    }
    .chip{
      background-color: red !important;
      color: #000 !important;
      padding: 8px 17px;
      width: 20%;
      border-radius: 30px;
    }
    .top{
      margin-top: 60px;
      color: #000;
    }
    .btn{
      padding: 10px 20px; 
      font-size: 15px; 
      background-color:#000; 
      border: none; 
      border-radius:2px; 
      color:#fff;
    }
    .center{
      margin-left: 30%;
    }
    .top2{
      background: #fff;
    }
  </style>
</head>


<?php
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');

if(isset($_GET['id']))
{
 $id= $_GET['id'];
 $id=mysqli_real_escape_string($con,$id);

?>

<div style="background: #f44336;">
<div class="row">
<div class="container">
<form action="password_check.php?id=<?php echo $id;?>" method="POST">
<?php
if(isset($_SESSION['message']))
{
echo $_SESSION['message'];
unset($_SESSION['message']);
}
?>


<div class="col-lg-12"><br><br>
  <h2 class="text-uppercase text-center" style="color: #000;">Password Reset Setting</h2><br>
</div>
<div class="row top2">
  <div class="col-lg-2"></div>
<div class="col-lg-7 top">
<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm-Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm-Password" name="password_2">
  </div>

<div class="center">
  <input type="submit" value="Change Password" name="update" class="btn text-white"> 
</div><br>
</div>
</div><br><br>
</form>
</div>
</div>
</div>

</div>   
<?php

  include "includehome/footer.php";
 ?>
<?php 

}
 ?>



