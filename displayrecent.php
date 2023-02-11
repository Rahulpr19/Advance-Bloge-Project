<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');
  $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($con,$sql1);
	$row1=mysqli_fetch_assoc($res1);
    $id=$row1["id"];

    $sql="select * from upload where rec_id=$id order by id DESC limit 2";
    $res=mysqli_query($con,$sql);
    ?>
<table class="table table-border">
<?php
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res))
  {
?>
<tr>
	<td>
		<?php echo $row['head']; ?>
		<br>
		<span><a href="edit.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;"><i class="fa fa-edit"></i> Edit</a>| <a href="" id="<?php echo $row['id']; ?>" class="delete" style="text-decoration: none;"><i class="fa fa-delete"></i> Delete</a> | <a href="postcom.php?id=<?php echo $row['id'];?>" style="text-decoration: none;"><i class="fa fa-share" ></i> Read more...</a></span>
	</td>

</tr>
<?php

  }
}
?>
</table>


