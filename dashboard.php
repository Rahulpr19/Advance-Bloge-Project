<?php include('server.php') ?>
<?php include ('rec_server.php') ?>
<?php 
include "includehome/header-home.php"; 
include "includehome/dashboard-hearder.php";
?>

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


 <!--------------Display Name------------------>
  <?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
    ?>

    <!------------------Display profile Picture-------------------------->
<?php 
$con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $id=$row1["id"];

    $sql2="select * from imgupload where user_id=$id order by id DESC limit 1";
    $res2=mysqli_query($con,$sql2);
          $row2=mysqli_fetch_assoc($res2);
 ?>


<nav class="navbar" style="background: #f44336;">
  <a class="navbar-brand" href="#"><img src="image/logo1.png" style="width: 100px;"></a>
<i class="fa fa-bars fa-2x mobn" onclick="slideshow()" style="color: #fff; display: none;"></i>
    <div class="container">
      <ul class="nav justify-content-end" style="float: right;">
        <li class="nav-item">
          <a class="nav-link active text-white" href="login.php"><i class="fa fa-user"></i>&nbsp;Register</a>
        </li>
    </ul>
  </div>
</nav>


<div class="row" style="padding-right: 0px; margin-right: 0px;">
  <div class="col-lg-3" style="padding-right: 0px;">
<!----------------End Profile Picture Php Coding-------------------->
<div class="sides" id="readmore">
  <div class="card" style="width: 270px;">
    <div class="card-image">
      <img src="image/gg.jpg" alt="" class="responsive-img" style="width: 270px;">
      <div class="card-img-overlay">
        <a href="profile.php"><img src="<?php echo $row2['image']; ?>" alt="" class="responsive-img rounded-circle" style="border: 2px solid #f44336; width: 75px; height: 75px;">
          <span class="name text-white"><a class="nav-link text-white" href="profile.php"><?php echo $row1['username']; ?></a></span>
            <span class="email white-text"><?php echo $row1['email']; ?></span>
        </a>
      </div>
    </div>
  </div>

<div class="sidena" style="width: 270px;">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="dashboard3.php"><i class="fa fa-user">&nbsp;Dashboard</i></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="home.php"><i class="fa fa-home">&nbsp;Home</i></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="profile.php"><i class="fa fa-users">&nbsp;Profile</i></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="firstpage.php"><i class="fa fa-database">&nbsp;Posts</i></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="notification.php"><i class="fa fa-bell">&nbsp;Notification</i></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="contactus.php"><i class="fa fa-mobile">&nbsp;Contact</i></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="Passwordsetting.php?id=<?php echo $row['id']; ?>"><i class="fa fa-key">&nbsp;Password</i></a>
    </li>
    <div class="divider"></div>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out">&nbsp;Logout</i></a>
    </li>
  </ul>
</div>
</div>
</div>

<!----------------Data Sheet------------------->
<div class="col-lg-9"><br>
<!--------------Dashboard Part----------------->
<div class="row text-center">

<!------------------Display Total No. of your-Post---------------------->
<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');
  $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $id=$row1["id"];

    $sql="select * from upload where rec_id=$id limit 1";
    $res=mysqli_query($con,$sql);

    ?>
<?php
  while($row=mysqli_fetch_assoc($res))
  {
?>
        <div class="col-sm-3" style="background: #f44336;">
          <div class="card bg-white">
            <div class="card-header">No. of Your Post</div>
            <div class="card-body">
              <h4 class="card-title"><?php echo getrecnt($row['rec_id']); ?></h4>
              <a class="view" href="yourrecentpost.php" class="text-white">View</a>
            </div>
          </div>
        </div><?php } ?>&emsp;&emsp;

<!------------------Display Total No. of Users---------------------->
<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');

    $sql="select * from users limit 1";
    $res=mysqli_query($con,$sql);

    ?>
<?php
  while($row=mysqli_fetch_assoc($res))
  {
?> 
        <div class="col-lg-3" style="background: #f44336;">
          <div class="card bg-white">
            <div class="card-header">No. of Users</div>
            <div class="card-body">
              <h4 class="card-title"><?php echo getuser($row['id']); ?></h4>
              <a class="view" href="#" class="text-white">View</a>
            </div>
          </div>
        </div><?php } ?>&emsp;&emsp;

<!------------------Display Total No. of Post---------------------->
<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');

    $sql4="select * from upload limit 1";
    $res4=mysqli_query($con,$sql4);

    ?>
<?php
  while($row4=mysqli_fetch_assoc($res4))
  {
?> 
        <div class="col-lg-3" style="background: #f44336;">
          <div class="card bg-white">
            <div class="card-header">Total No. of Posts</div>
            <div class="card-body">
              <h4 class="card-title"><?php echo getupload($row4['id']); ?></h4>
              <a class="view" href="firstpage.php" class="text-white">View</a>
            </div>
          </div>
        </div><?php } ?>
  </div><br><br>

  <?php include "includehome\dashrecentposttable.php"; ?>
<!-----------------Tranding Blog------------------->
<div  class="row">
  <div class="col-lg-10">
    <?php include "dashboard tranding blog.php"; ?>
  </div>
</div>

</div>
</div>

<script type="text/javascript">
                  
                  function slideshow(){
                  var x = document.getElementById('readmore');
                  if(x.style.display === "none"){
                    x.style.display ="block";
                  }else {
                    x.style.display ="none";
                  }
                }

                </script>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
      // Custom JS & jQuery here
      $('.button-collapse').sideNav();
    });
  </script>

