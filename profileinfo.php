<!---------------*******DATABASE REGISTER OR LOGIN PAGE********----------------->
<?php include('server.php') ?>

<!--------------*********LINK HEADER OR NAVBAR********----------------->
<?php
     include "includehome/header-home.php";
     include "includehome/home-navbar.php"; 
 ?>


<!------------********FOR FONT TYPE*********------------>
<head>
<style>
    body{
      font-family: Palatino Linotype;
    }
</style>
</head>

<div style="background: #f44336;">
<!------------*******FOR CONTAINT PAGE*******------------>
<div class="container con">
	<div style="width: 90%; margin: 0px auto;"><br>
		<h1 class="text-center">Profile Info</h1>
		<h4 class="text-center">(Welcome to your Profile page)</h4><br>
<div class="card-panel" style="border: 1px solid #ddd; padding: 20px; background: white; margin-bottom: 60px;">

<!-------------*****Profile Picture*****-------------------->
<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');
  $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $id=$row1["id"];

    $sql="select * from imgupload where user_id=$id order by id DESC limit 1";
    $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
    ?>
		<img src="<?php echo $row['image']; ?>" class="img-fluid mb-2 rounded-circle" style="height: 150px; width: 140px; border: 2px solid #fff;">

<!--------*******Display Name*******--------->
<div class="row">

	<?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          ?>


<div class="col-lg-6">
<div class="contant">
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
        </div>
</div>

<!-------------------Add More Details --------------------->
<?php 

    $sql4="select * from add_details where your_id=$id order by id DESC limit 1";
    $res4=mysqli_query($con,$sql4);
          $row3=mysqli_fetch_assoc($res4);
    ?>

		<div class="form-group">
        	<label> Location:</label>
        	<span class="form-control"><?php echo $row3['location'];?></span>
        </div>
</div>
<div class="col-lg-6">
      <div class="form-group">
          <label> Institute:</label>
          <span class="form-control"><?php echo $row3['institute'];?></span>
        </div>
        <div class="form-group">
        	<label> Pin-Code:</label>
        	<span class="form-control"><?php echo $row3['pincode'];  ?></span>
        </div>
        <div class="form-group">
        	<label> D.O.B:</label>
        	<span class="form-control"><?php echo $row3['birth'];  ?></span>
        </div>
        <div class="form-group">
          <label> BIO:</label>
          <span class="form-control"><?php echo $row3['bio'];?></span>
        </div>
</div>
</div><br><br>
</div>
<!--------*********FOR BUTTONS**********--------->
<center>
<div class="form-group">
<a href="profile.php" style="padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius: 5px; color: #fff; text-decoration:none;">Profile Page</a>
<a href="addmoredetail.php" style="padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius: 5px; color: #fff; text-decoration:none;">Previous</a><br>
</div>
</center><br>

</div>
</div>
</div>
<!-------------------*******FOOTER**********--------------------->
</div>
<?php 
  include "includehome/footer.php";
 ?>


