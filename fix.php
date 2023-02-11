<?php
 	  include "includehome/header-home.php";
    include "includehome/home-navbar.php";
?>

<div class="row">
	<?PHP

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'blog_cms');



	$query = " SELECT * FROM `upload` order by id DESC ";
	$queryfire = mysqli_query($con, $query);
	$num = mysqli_num_rows($queryfire);
	if(mysqli_num_rows($queryfire)>0)
	{
	while($row=mysqli_fetch_assoc($queryfire))
	{
	?>

<!---------------user------------------>
<?php 

       $username=$row["username"];	
	
 ?>

<div class="col-lg-8">

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
}
?>
<div class="col-lg-4">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
</div>
</div>

</div>
 <?php 
  include "includehome/footer.php";
 ?>



