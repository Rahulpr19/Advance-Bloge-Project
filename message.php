<?php 
include('db.php')

?>
<?php
     include "includehome/header-home.php";
     include "includehome/home-navbar.php";
     
 ?>
<!-------------------------- Message delivered Alernt !----------------------------->
<center>
<div class="border 3px content">
          <?php 
            $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $sql="select * from users";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);

          if (isset($_SESSION['success'])): ?>
            <div class="error success">
              <center>
              <h1>We do not keep you waiting!</h1>
              Our support agent are availabe 24/7 for phone chatTickerting sopport
            </center><br><br>


            <span style="font-size: 140%; font-family: MS Office Symbol Extralight;">
                <?php 
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                 ?>
                 <br>Thank You  We are helping you as soon as possible , We are working for it ...
                 <br><br>Thank You<br><span class="bold text-uppercase"><?php echo $row['username'];  ?></span><br>for being a part of it...<br>We Will inform You As Soon As...
                 <br><br><br>
              </span>
<br>
<!--------------down card------------------>
<center>
    <div class="row">
      <div class="col-lg-4 col-md-3 col-12">
        <div class="card" >
          <a href="#"><img src="image/you.png" class="card-img-top" alt="..." style="width: 150px; margin: 70px 70px;"></a>
          <div class="card-body">
            <a href="#"><p>visit on youtube</p></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-3 col-12">
        <div class="card" >
          <a href="#"><img src="image/googli.png" class="card-img-top" alt="..." style="width: 150px; margin: 70px 70px;"></a>
          <div class="card-body">
            <a href="#"><p>visit on G-mail</p></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-3 col-12">
        <div class="card" >
          <a href="#"><img src="image/play.png" class="card-img-top" alt="..." style="width: 150px; margin: 70px 70px;"></a>
          <div class="card-body">
            <a href="#"><p>App  are available</p></a>
          </div>
        </div>
      </div>
    </div>
  </center>
    <br><br>


    <h1 class="bold text-uppercase">Have a Good Day <?php echo $row['username']; ?> !!! </h1><br><br><br>
    </div>
          
      <?php endif ?>
      </div>
    </center>
  </div>


<!------------------Footer------------------------>
<?php 
  include "includehome/footer.php";
 ?>