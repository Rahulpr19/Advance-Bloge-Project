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

<div  style="background: #f44336;">
<div class="row">
  <div class="col-lg-1"></div>
    <div class="col-lg-10"><br>
      <h1 class="text-center">Profile Page</h1>
        <h4 class="text-center" style="margin-bottom: 60px;">(We present for your help)</h4>
          <div class="col-lg-12" style="background: #fff; border-radius: 20px; margin-bottom: 5px;">
            <center><?php include "imageupload.php"; ?></center>
          </div>
<!--------------Display Name------------------>
  <?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          ?>

        <div class="card-panel" style="border: 1px solid #ddd; padding: 20px; background: white; margin-bottom: 60px; border-radius: 20px;">
          <div class="row">
              <div class="col-lg-7">
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
              <div class="col-lg-1"></div>
              <div class="col-lg-3" style="border: 2px solid #f44336; border-radius: 15px;"><br>
                <h3 class="text-black">Your Recent Post</h3>
                  <div class="dropdown-divider"></div>
                  <?php include "displayrecent.php"; ?>
                </div>
              <div class="card-panel">
                <div class="dropdown-divider"></div><br>
              </div>
            </div><br>
    <div class="row"> 
      <div class="col-lg-1">
        <a class="dropdown-item" href="addmoredetail.php?id=<?php echo $row['id']; ?>" style="background: transparent;">Add More</a>
      </div>&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="col-lg-1">
        <a class="dropdown-item" href="profileinfo.php" style="background: transparent;">Profile Info</a>
      </div>&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="col-lg-1">
        <a class="dropdown-item" href="yourrecentpost.php" style="background: transparent;">Recent Feed</a>
      </div>&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="col-lg-4">
        <a class="dropdown-item" href="logout.php" style="background: transparent;">Logout</a>
      </div>
      <div class="col-lg-1">
        <a href="#"><i class="fa fa-facebook-official fa-2x" style="color: #425daa;"></i></a>
      </div> 
      <div class="col-lg-1">
        <a href=""><i class="fa fa-instagram fa-2x" style="color: red;"></i></a>
      </div>
      <div class="col-lg-1">
        <a href=""><i class="fa fa-youtube-play fa-2x" style="color: red;"></i></a>
      </div>
      <div class="col-lg-1">
        <a href=""><i class="fa fa-google-plus-square fa-2x" style="color: red;"></i></a>
      </div>
    </div>
<!-----------------downpart------------------------->
<br><div class="card-panel">
<div class="dropdown-divider" style="background: #f44336;"></div><br>

<!-----------------Contact Me------------------->
<section style="margin-bottom: 40px;">
  <div class="row">
    <div class="col-lg-2">
      <div class="form-group bt">
        <a href="addmoredetail.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: #000;"><i class="fa fa-edit"></i>Upload More..</a> <br><br><br>
      </div>
    </div>
      <div class="col-lg-1">
        <!------------------------Edit Button------------------------------>
        <a href="editprofile1.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: #000;"><i class="fa fa-edit"></i> Edit</a>
      </div>
      <div class="col-lg-5">
        <div class="form-group">
          <li class="dropdown" style="list-style: none;">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000;">

            <button value="Settings" class="but" style="border: none;background: transparent;">Settings</button>
           </a>
          <div class="hov">
           <div class="dropdown-menu"aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="Passwordsetting.php?id=<?php echo $row['id']; ?>"><span class="txt">Password setting</span></a>
             <a class="dropdown-item" href="profileinfo.php?id=<?php echo $row['id']; ?>"><span class="txt">Profile Info</span></a>
           </div>
         </div>
          </li>
        </div>
      </div>
  </div>
</section>
</div>
</div>

</div>
</div>
</div>
</div>
<?php 
  include "includehome/footer.php";
 ?>

