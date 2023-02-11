<?php
  include "includehome/header-home.php";
  include "includehome/home-navbar.php";
?>
<?php include('server.php') ?>
<?php include ('rec_server.php') ?>
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

<?php include "home-nav2.php"; ?><br>

<body style="font-family: Palatino Linotype;">
<div style="width: 98%; margin: 0px auto; ">
<div class="row">
<!-- This is main content area-->
<div class="col-lg-8"  style="background: #f44336;" >
<br>
<h3 class="text-center text-uppercase">Your Recent Post</h3>
<h6 class="text-center text-uppercase">(Your timeline)</h6><br>

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

<h5 style="margin-left: 12px;">No. of recent post(<span class="likes"><?php echo getrecnt($row['rec_id']); ?></span>)</h5>

<?php 
}
 ?>

<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');
  $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($con,$sql1);
   $row1=mysqli_fetch_assoc($res1);
    $id=$row1["id"];

    $sql="select * from upload where rec_id=$id order by id DESC";
    $res=mysqli_query($con,$sql);

    ?>
<?php
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res))
  {
?>


<div class="col lg-8">
  <div class="border" style="padding: 20px 10px; background-color: #fff; border-radius: 20px;">
    <img src="<?php echo $row['image'];?>" alt="Jane Doe" class="mr-3 mt-3 rounded-circle responsive-img" style="width:55px; height: 55px;">
      <a href="profile.php?id=<?php echo $row['id'];?>" style="text-decoration: none;">
        <span><?php echo $row1['email']; ?></span>&nbsp; (<span><?php echo $row1['username']; ?></span>)</a>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
           <span class="justify-content-end"><?php echo $row['date'];?></span>&emsp;
          <span><a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000; text-decoration: none;"><span style="color: #000;">Intro</span></a>
        <div class="dropdown-menu" style="background:#f44336;;" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
          <a class="dropdown-item" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
          <a class="dropdown-item" href="firstpage.php")>Share</a>
        </div>
        </span>
   
      <div class="media-body">
        <h5><?php echo $row['head'];?></h5>
          <p><?php echo $row['body'];?></p>
      </div>

<div class="dropdown-divider"></div>
  <!------------------Like part--------------------->
  <div class="dropdown-divider" style="border-color: #fff;"></div>
  <div class="row">
    <div class="col-lg-8">
      <!-- if user likes post, style button differently -->
        <i <?php if (userLiked($row['id'])): ?>
            class="fa fa-thumbs-up like-btn" style="color: red;"
          <?php else: ?>
            class="fa fa-thumbs-o-up like-btn" style="color: red;"
          <?php endif ?>
          data-id="<?php echo $row['id'] ?>"></i>
        <span class="likes"><?php echo getLikes($row['id']); ?></span>
        
        &nbsp;&nbsp;&nbsp;&nbsp;

      <!-- if user dislikes post, style button differently -->
        <i 
          <?php if (userDisliked($row['id'])): ?>
            class="fa fa-thumbs-down dislike-btn" style="color: red;"
          <?php else: ?>
            class="fa fa-thumbs-o-down dislike-btn" style="color: red;"
          <?php endif ?>
          data-id="<?php echo $row['id'] ?>"></i>
        <span class="dislikes"><?php echo getDislikes($row['id']); ?></span>
      
      <!------------------Comment Part--------------------->
        <span class="likes" style="margin-left: 30px;">
          <a href="postcom.php?id=<?php echo $row['id'];?>" style="color: black; text-decoration: none;">
            <i class="fa fa-comment" style="color: red;"></i>
            <span class="likes"><?php echo getcommt($row['id']); ?></span>
          </a>
        </span>

        <!---------------Share Part------------------->
        <span style="margin-left: 30px;">
          <i class="fa fa-share" style="color: red;"></i>
        </span>
    </div>
    <div class="col-lg-2">
      <a href="postcom.php?id=<?php echo $row['id'];?>" style="text-decoration: none; float: right;">Read More</a>
    </div>
      <div class="col-lg-2">
        <span>views(<?php echo $row['view'];?>)</span>
      </div>
    </div>
</div>
</div>
<div style="margin-bottom: 8px;"></div>
<?php
  }
}
?>
</div>
<!-- This is sidebar area-->
  <div class="col-lg-4" style="background: #f44336;"><br><br><br><br><br>
    <div style="background: #fff; border-radius: 20px;">
      <?php include "trandingblog.php"; ?>
    </div>
  </div><br>
</div>
</div>
</body>
<script src="script rec.js"></script>
</div>
<?php 
  include "includehome/footer.php";
 ?>




