<?php
    include "includehome/header-home.php";
    include "includehome/home-navbar.php";
    include "server.php";
    include "home-nav2.php";
?>
<br>
<?php

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
  <div class="row">
    <div class="col-lg-8" style="background: #dee2e642;">
    <h1 class="text-center">Your Search String Found</h1>
  </div>
  </div>
    <br>
  <div class="row">
  <?php
  while($row=mysqli_fetch_assoc($res))
  {
?>

<div class="col-lg-8" style="background: #dee2e642;">
<div class="media border p-3">
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
</div><br>
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

