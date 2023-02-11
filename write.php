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

<?php
 	    include "includehome/header-home.php";
     include "includehome/home-navbar.php";
?>

<head>
	<style>
    body{
      font-family: Palatino Linotype;
    }
		.btn2{
			padding: 10px 20px;
			font-size: 15px;
			background-color:#000;
			border: none;
  			border-radius: 2px;
  			color: #fff;
		}
		.area{
			border:none;
			border-bottom: 1px solid black;
		}
		 .error {
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background-color: hsla(227, 34%, 94%, 0.50);
        border-radius: 5px;
        text-align: left;
      }
    .success {
      color: #3c763d;
      border: 1px solid #3c763d;
      margin-bottom: 20px;
    }
    .bg{
      background-color: green !important;
      color: #fff !important;
      padding: 8px 17px;
      width: 20%;
      border-radius: 30px;
    }
    .chip{
      background-color: red !important;
      color: #000 !important;
      padding: 8px 17px;
      width: 20%;
      border-radius: 30px;
    }
	</style>
</head>

<div style="background: #f44336;"><br><br>
<center><h2>Write Your post</h2></center><br>
<div class="container" style="background: #fff;">
<form action="postupload.php" method="POST" enctype="multipart/form-data">

<?php
if(isset($_SESSION['message']))
{
echo $_SESSION['message'];
unset($_SESSION['message']);
}
?>

<div class="form-group"><br>
<label for="user"><span style="font-size: 150%;">Title For Post</span></label>
  <textarea id="user" class="md-textarea form-control area" rows="3" placeholder="Title For Post" name="head"></textarea>
 <input type="text" name="title" hidden="">
</div><br><br>

<div class="form-group">
  <label for="user"><span style="font-size: 150%;">Upload File:</span></label>
    <input type="file" name="file" id="file" class="form-control">
</div><br>

<div class="form-group">
<label for="user"><span style="font-size: 150%;">Post Content</span></label>
  <textarea id="body" class="md-textarea form-control" rows="8" placeholder="write your post" name="body">
  </textarea>
</div>

<div class="center">
<input type="submit" value="Publish" name="submit" class="btn2 white-text" >
</div>
</form><br>
</div><br><br> 
</div>

</div>
    <?php

    include "includehome/footer.php";
    ?>
