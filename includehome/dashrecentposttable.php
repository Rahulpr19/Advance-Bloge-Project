<br>

<?php 
	$con = mysqli_connect('localhost','root');
    	mysqli_select_db($con,'blog_cms');
	$email=$_SESSION['email'];

    $sql5="select * from users where email='$email'";
    $res5=mysqli_query($con,$sql5);

    $sql8="select * from upload where rec_id=$id order by  id DESC limit 1";
    $res8=mysqli_query($con,$sql8);
   ?>
<?php
	 while($row5=mysqli_fetch_assoc($res5))
	{
?>
<?php
	 while($row8=mysqli_fetch_assoc($res8))
	{
?>

<div class="row">
	<div class="col-lg-11">
		<p class="text-white p-2 text-center shadow" style="background: #f44336;">List of Details</p>
	</div>
</div>
	<div class="row">
		<div class="col-lg-2" style="border: 1px solid #ddd; text-align: center;">
			<span><b>USER ID</b></span><br>
			<div class="dropdown-divider"></div>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><?php echo $row5['id'];  ?></li><br><div class="dropdown-divider"></div>
			<span><b>POST ID</b></span><div class="dropdown-divider"></div>
				<li class="nav-item"><?php echo $row8['id'];  ?></li><br>
			</ul>
		</div>
		<div class="col-lg-3" style="border: 1px solid #ddd; text-align: center;">
			<span><b>USERNAME</b></span><br>
			<div class="dropdown-divider"></div>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><?php echo $row5['username'];  ?></li><br><div class="dropdown-divider"></div>
			<span><b>TITLE</b></span><div class="dropdown-divider"></div>
				<li class="nav-item"><?php echo $row8['head'];  ?></li><br>
			</ul>
		</div>
		<div class="col-lg-4" style="border: 1px solid #ddd; text-align: center;">
			<span><b>EMAIL</b></span><br>
			<div class="dropdown-divider"></div>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><?php echo $row5['email'];  ?></li><br><div class="dropdown-divider"></div>
			<span><b>CONTENT</b></span><div class="dropdown-divider"></div>
				<li class="nav-item"><?php echo $row8['body'];  ?></li><br>
			</ul>
		</div>
		<div class="col-lg-1" style="border: 1px solid #ddd; text-align: center;">
			<span><b>STATUS</b></span><br><div class="dropdown-divider"></div>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">User</li><br><div class="dropdown-divider"></div>
			<span><b>ACTIVITY</b></span><div class="dropdown-divider"></div>
				<li class="nav-item">
					<a class="dropdown-item text-success" href="edit.php?id=<?php echo $row['id']; ?>
          				">Edit</a>
          			<a class="dropdown-item text-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
          		</li>
			</ul>
		</div>
		<div class="col-lg-1" style="border: 1px solid #ddd; text-align: center;">
			 <a href="yourrecentpost.php" style="text-decoration: none; float: right; margin-top: 150px;">Read More Post</a>
		</div>
	</div>

<?php } }?>