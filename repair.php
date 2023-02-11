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
     .btn{
      padding: 10px 20px;
      font-size: 15px;
      background-color:#000;
      border: none;
      border-radius: 6px;
      color: #fff;
    }
    .btn-style a{
      text-decoration: none;
      color: #fff;
    }
    .form{
      border:1px solid #ddd;
      margin-top: 40px;
    }
    .lis li{
      list-style: none;
      margin-top: 30px;
    }
    .con{
      border: 1px solid #aeacac;
      padding: 20px 20px;
    }
   </style>
 </head>

  <div class="row" style="background: #f44336;">
    <div class="col-lg-1"></div>
    <div class="col-lg-7">
		<h1 class="text-center text-primary">Profile Page</h1>
		<h4 class="text-center">(Welcome to your Profile page)</h4><br>
    <div class="card-panel" style="border: 1px solid #ddd; padding: 20px; background: white; margin-bottom: 60px;">

<!-----------display cover photo and navbar---------->
			<?php include "profilenav/nav.php" ?>

			<br><br>

<!--------------Display Name------------------>


	<?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          ?>

		    <div class="form-group">
        	<label> Username:</label>
        	 <span class="form-control text-uppercase"><?php echo $row['username'];  ?></span>
        </div>
        <div class="form-group">
        	<label> Email Id:</label>
        		<span class="form-control"><?php echo $row['email'];  ?></span>
        </div>
        <div class="form-group">
        	<label> Mobile No.:</label>
        	<span class="form-control"><?php echo $row['MobileNo'];  ?></span>
        </div><br>

<!--------------Add More Details------------------>
<div class="btn-style">
<a href="addmoredetail.php?id=<?php echo $row['id']; ?>" class="btn text-white"><i class="fa fa-edit"></i>Add More..</a> <br>
</div>
<div class="col-lg-4">
 <!------------------------Edit Button------------------------------>
<div class="btn-style">
<a href="uploadimg.php" class="btn text-white"><i class="fa fa-edit"></i>Upload More..</a> <br><br><br>
<!------------------------Edit Button------------------------------>
<a href="editprofile1.php?id=<?php echo $row['id']; ?>" class="btn text-white"><i class="fa fa-edit"></i> Edit</a>
</div>

	<div class="lis">
	<li class="dropdown">
	 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

	  <button value="Settings" type="btn" class="btn text-white">Settings</button>
	 </a>
	 <div class="dropdown-menu"aria-labelledby="navbarDropdown">
	   <a class="dropdown-item" href="Passwordsetting.php?id=<?php echo $row['id']; ?>">Password setting</a>
	   <a class="dropdown-item" href="profileinfo.php?id=<?php echo $row['id']; ?>">Profile Info</a>
	   <div class="dropdown-divider"></div>
	   <a class="dropdown-item" href="postupload.php")>More</a>
	 </div>
	</li>
	</div>

<form class="form">
	<div class="container">
		<h3 class="text-primary">Your Recent Post</h3>
		<div class="dropdown-divider"></div>
		<div class="form-group">
      <?php include "displayrecent.php"; ?>
		</div>
	</div>
</form>
</div>
</div>
<?php 
  include "includehome/footer.php";
 ?>


 
