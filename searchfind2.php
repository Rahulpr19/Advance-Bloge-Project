<?php
    include "includehome/header-home.php";
    include "includehome/home-navbar.php";
?>
<div class="row p-3" style="background: #f44336;">
  <div class="col-lg-7">
    <h4 class="text-uppercase text-white">hello user</h4>
  </div>
  <div class="col-lg-5">
    <?php include "search2.php"; ?>
  </div>
</div>
<br>

 <div class="row" style="background: #f44336;">
<?php

$con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');

if(isset($_GET['submit']))
{

$q=$_GET['search'];
$q=mysqli_real_escape_string($con,$q);
$q=htmlentities($q);
$sql="select * from upload where head like '$q' or body like '$q' or head like '%$q%' or body like '%$q%'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
  ?>
  <h3 class="text-white">Your Search String Found</h3>
    <div class="col-lg-8">
  </div>
  </div>
  <div class="row" style="background: #f44336;">
  <?php
  while($row=mysqli_fetch_assoc($res))
  {
?>

<div class="col-lg-8" style="background: #f44336;"><br>
<div class="media border p-3 bg-white">
<img src="<?php echo $row['cov_img']; ?>" alt="" class="mr-3 mt-3 rounded-circle" style="width:60px;">
<div class="media-body">
<span class="text-uppercase"><p><?php echo $row['username']; ?></p></span>
<!---------------card------------------> 

<img src="<?php echo $row['image'];?>" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;">
  <div class="media-body">
    <h4><?php echo $row['head'];?> &nbsp; <small><?php echo $row['date']; ?></small></h4>
     <p><?php echo $row['body'];?></p>
      <a href="postcom.php?id=<?php echo $row['id'];?>" class="text-uppercase" style="text-decoration: none;">Read More</a>
  </div>
 </div>
</div>
</div>

<?php
  }
  ?>

  <?php

}
else
{
  ?>
<h5>Sorry No data Found By given Search String, Try Again with another Search String.</h5>

  <?php
}
}
else
{
  header("Location: firstpage.php");
}


?>

</div>
 <?php 
  include "includehome/footer.php";
 ?>

