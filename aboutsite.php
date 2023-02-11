<?php
     include "includehome/header-home.php";
     include "includehome/home-navbar.php";
     
 ?>
 <head>
 	<style>
 		body{
      font-family: Palatino Linotype;
    }
    .main{

    	margin: 5px 45px;
    }
 	</style>
 </head>
  
 <div style="background: #f44336;">
 	<div class="main"><br>
     <h2 class="text-center">About Us</h2>
     <h5 class="text-center">(We present for your help)</h5><br>

 <div class="row">
    <div class="col-lg-8" style="background: #fff;border-radius: 20px;"><br>
 <!---------------------------About More/ Read More pop-up box--------------------------------------->
     <?php include "aboutofpage.php"; ?>
    </div>&nbsp;
    <div class="col-lg-3" style="background: #fff;border-radius: 20px;">
         <!-- This is sidebar area-->
        <?php include "trandingblog.php"; ?>

        <?php include "socialmedia.php"; ?>
    </div>
</div>
</div><br><br>
</div>


</div>
 <?php include "includehome/footer.php"; ?>


