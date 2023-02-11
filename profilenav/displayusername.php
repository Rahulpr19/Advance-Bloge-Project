<?php 

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');

$display = "SELECT * FROM upload order by id DESC";
$queryfire = mysqli_query($con, $display);

	$num = mysqli_num_rows($queryfire);

	if(mysqli_num_rows($queryfire)>0)
	{
	$row=mysqli_fetch_assoc($queryfire)
 ?>
 
 <span><?php echo $row['body']; ?></span>

<?php 

}
 ?>
<br>
<span><a href="edit.php?id=<?php echo $row['id']; ?>"><i class="material-icons tiny">edit</i> Edit</a>| <a href="" id="<?php echo $row['id']; ?>" class="delete"><i class="material-icons tiny red-text">clear</i> Delete</a> | <a href=""><i class="material-icons tiny green-text">share</i> Share</a></span>
</li>
