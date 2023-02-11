<?php
    include "includehome/header-home.php";
    include "includehome/home-navbar.php";
?>

<!------------Check Login or not---------------->

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


<h2 class="text-center text-primary text-uppercase">Your Recent Post</h2><br><br>
<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');
  $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($con,$sql1);
	 $row1=mysqli_fetch_assoc($res1);
    $id=$row1["id"];

    $sql="select * from upload where rec_id=$id order by id DESC";
    $res=mysqli_query($con,$sql);
    ?>
<?php
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res))
  {
?>
<div class="container">
<div class="row">
<div class="col-lg-10">
  <div class="border" style="padding: 20px 10px; background-color: #f8f9faed;">
      <span class="d-flex justify-content-end"><?php echo $row['date'];?></span>
      <img src="<?php echo $row['image'];?>" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:55px;">
      <div class="media-body">
        <h4><?php echo $row['head'];?></h4>
        <p><?php echo $row['body'];?></p>
      </div>
<div class="dropdown-divider"></div>
<div class="col-lg-12">
  <span><a href="edit.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;"><i class="fa fa-edit"></i> Edit</a>| <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="DeleteUser()" class="delete" style="text-decoration: none;"><i class="fa fa-delete"></i> Delete</a> | <a href="" style="text-decoration: none;"><i class="fa fa-share" ></i> Share</a></span>

  <a href="postcom.php?id=<?php echo $row['id'];?>" class="text-uppercase" style="text-decoration: none; float: right;">Read More</a>
</div>
</div>
</div>
</div>
</div>
<br>
<?php

  }
}
?>

<script>
  /////////////delete userdetails ////////////
function DeleteUser(deleteid){

  var conf = confirm("are u sure");
  if(conf == true) {
  $.ajax({
    url:"delete.php",
    type:'POST',
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}
</script>

</div>
 <?php 
  include "includehome/footer.php";
 ?>
