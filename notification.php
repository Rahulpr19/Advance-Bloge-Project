<?php include('server.php') ?>
<?php 
include "includehome/header-home.php"; 
include "includehome/dashboard-hearder.php";
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

<nav class="" style="background: #f44336;">
  <div class="nav-wrapper">
<div class="container">
<a href="" class=" center"><a class="nav-link text-white" href="login.php" style="float: right;"><i class="fa fa-user"></i>&nbsp;Register</a><img src="image/logo1.png" style="width: 100px;"></a>
<a href="" class="button-collapse show-on-large" data-activates="sidenav"><i class="fa fa-bars fa-2x" style="color: #fff;"></i></a>
</div>
</div>
</nav>


<?php
$con9 = mysqli_connect('localhost','root');
          mysqli_select_db($con9,'blog_cms');

$sql9="select * from comment where post_id=$id order by id DESC";
$res9=mysqli_query($con9,$sql9);

  while($row9=mysqli_fetch_assoc($res9))
  {
?>
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-4" style="background: #f44336; max-width: 18rem; margin-top: 10px;">
         <div class="card bg-white">
            <div class="card-header">No. of Recent Comment</div>
            <div class="card-body">
              <h4 class="card-title"><?php echo $row9["id"]; ?></h4>
              <a class="view" href="#" class="text-white">View</a>
            </div>
          </div>
        </div>
  </div>
</div>
<?php
} ?>
<!------------End Profile Name and Email------------------->
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

<!----------------End Profile Picture Php Coding-------------------->

<ul class="side-nav fixed bg-lighter" id="sidenav">
<li class="nav-item active">
<div class="user-view">
<div class="background">
<img src="image/gg.jpg" alt="" class="responsive-img">
</div>
<a href="profile.php"><img src="<?php echo $row2['image']; ?>" alt="" class="circle" style="border: 2px solid #f44336;"></a>
<span class="name white-text"><a class="nav-link text-white" href="profile.php"><?php echo $row['username'];  ?></span>
<span class="email white-text">
<?php echo $row['email'];  ?></a>
</span>
</div>
</li>
<div class="side">
<ul class="navbar-nav mr-auto">
<li class="nav-item active" style="background: #f44336;">
  <a class="nav-link" href="dashboard3.php"><i class="fa fa-user" style="margin-left: 10px; color: #fff;">&nbsp;Dashboard</i></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="home.php"><i class="fa fa-home" style="margin-left: 10px; color: #000;">&nbsp;Home</i></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="profile.php"><i class="fa fa-users" style="margin-left: 10px; color: #000;">&nbsp;Profile</i></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="firstpage.php"><i class="fa fa-database" style="margin-left: 10px; color: #000;">&nbsp;Posts</i></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="dashboard3.php"><i class="fa fa-bell" style="margin-left: 10px; color: #000;">&nbsp;Notification</i></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="contactus.php"><i class="fa fa-mobile" style="margin-left: 10px; color: #000;">&nbsp;Contact</i></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="Passwordsetting.php?id=<?php echo $row['id']; ?>"><i class="fa fa-key" style="margin-left: 10px; color: #000;">&nbsp;Password</i></a>
</li>
<div class="divider"></div>
<div class="side2">
  <li class="nav-item active">
  <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" style="margin-left: 10px; color: #000;">&nbsp;Logout</i></a>
</li>
</ul>
</div>
</ul>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
      // Custom JS & jQuery here
      $('.button-collapse').sideNav();
    });
  </script>

