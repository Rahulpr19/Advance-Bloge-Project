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

<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
  <style>
    body{
      font-family: Palatino Linotype;
    }
    .msstyle{
  background-image: linear-gradient(to right,rgba(0,0,0,0.7), rgba(0,0,0,0)),url('image/ban2.jpeg');
  width: 100%;
  height: 450px;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  margin: 20px 0 40px 0;
  color: #fff;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding-left: 70px;
}
.bt{
  color: #000;
  background: #fff;
  font-weight: bold;
  font-size: 15px;
  padding: 10px 20px;
  border: none;
}
  </style>
</head>
<body>
  
<?php include "home-nav2.php"; ?>
<br><br><br>
	<!--------------For Slider------------------>

<div class="slider">
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/contact.jpg" class="d-block w-100" alt="..." >
        <div class="carousel-caption d-none d-md-block">
          <h5>Relates Tech</h5>
          <p>Stand out from the ordinary</p>
          <button>Explore NOW ></button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/homeslide.jpg" class="d-block w-100" alt="..." >
        <div class="carousel-caption d-none d-md-block">
          <h5>Share Your Opinion...</h5>
          <p>Discover what's possible every day with Blog 365</p>
          <button>Explore NOW ></button>
        </div>
      </div>
       <div class="carousel-item">
        <img src="image/slid3.jpg" class="d-block w-100" alt="..." >
        <div class="carousel-caption d-none d-md-block">
          <h5>This Is Your 365</h5>
          <p>Discover what's possible every day with Blog 365</p>
          <button>Explore NOW ></button>
        </div>
      </div>
       <div class="carousel-item">
        <img src="image/slid4.jpg" class="d-block w-100" alt="..." >
        <div class="carousel-caption d-none d-md-block">
          <h5>Find Opinion For Anything</h5>
          <p>Discover what's possible every day with office 365</p>
          <button>Explore NOW ></button>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<br><br>


<!--------------Blog And categories------------------>

<?php 
  include "card.php";
 ?>
<br>
<!--------------Banner------------------>

<section class="msstyle">

  <div class="mystore">
    <h3>Review & Comment System</h3>
    <p>Find the technology you need for home, school,work and fun</p>
    <button class="bt">Explore NOW ></button>
  </div>
</section>

<br><br>

<!----------------------Trending Blog------------------------>
<?php include "tranding.php"; ?>
<br><br>
<!------------------Social Site----------------------------->
<section style="margin-bottom: 40px;">
  <div class="row">
    <div class="col-lg-2">
      Follow MeBolgs
    </div>
      <div class="col-lg-1">
        <a href="#"><i class="fa fa-facebook-official fa-2x" style="color: #425daa;"></i></a>
      </div>
      <div class="col-lg-1">
        <a href=""><i class="fa fa-youtube-play fa-2x" style="color: red;"></i></a>
      </div>
      <div class="col-lg-1">
        <a href=""><i class="fa fa-google-plus-square fa-2x" style="color: red;"></i></a>
      </div>
        <a href="contactus.php" style="text-decoration: none; color: #000;">Contact Us</a>
  </div>
</section>






</div>
<?php 
  include "includehome/footer.php";
 ?>

</body>
</html>