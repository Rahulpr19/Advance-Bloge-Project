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


<?php

      	$con = mysqli_connect('localhost','root');
		mysqli_select_db($con,'blog_cms');

				if(isset($_GET['id']))
		{
		  
		  $id=$_GET['id'];
		  $id=mysqli_real_escape_string($con,$id);
		  $sql="select * from ourpeople where id=$id";
		  $res=mysqli_query($con,$sql);
		  if(mysqli_num_rows($res)>0)
		  {


		  	$sql2="select view from ourpeople where id=$id";
			$row=mysqli_fetch_assoc($res);
			$name=$row['name'];
			$image=$row['image'];
			$description=$row['description'];
?>
<div class="row" style="background: #f44336;">
  <div class="col-lg-1"></div>
  <div class="col-lg-10">
  <h1 class="text-center">Our People</h1>
 <h4 class="text-center" style="margin-bottom: 60px;">(We present for your help)</h4>
<div class="card-panel" style="border: 1px solid #ddd; padding: 20px; background: white; margin-bottom: 60px;">
 <center><img src="<?php echo $row['image'];?>" alt="" class="mr-3 mt-3 rounded-circle" style="width:120px; height: 120px;"></center> <br>
<h4 class="text-center"><?php echo($name);?></h4><br>
<p class="flow-text"><?php echo ($description);?></p><br>
<div class="card-panel">
<div class="dropdown-divider"></div><br>

<!-----------------Contact Me------------------->
<section style="margin-bottom: 40px;">
  <div class="row">
    <div class="col-lg-2">
      Contact Me
    </div>
      <div class="col-lg-1">
        <a href="#"><i class="fa fa-facebook-official fa-2x" style="color: #425daa;"></i></a>
      </div>
      <div class="col-lg-1">
        <a href=""><i class="fa fa-twitter fa-2x" style="color: blue;"></i></a>
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
</section>

<?php 
}
}


 ?>

</div>
</div>
</div>
</div>
</div>
<?php 
  include "includehome/footer.php";
 ?>






