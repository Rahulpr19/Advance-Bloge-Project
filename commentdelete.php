<?php include('server.php') ?>
<?php

session_start();

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');

if(isset($_GET['id']))
{
 $id= $_GET['id'];
 $id=mysqli_real_escape_string($con,$id);

              $q = "DELETE FROM `comment` where id=$id;";

              $query = mysqli_query($con, $q);
if($query)
{
$_SESSION['message']="<div class='bg'> comment is deleted</div>";
header("Location: postcom.php");
}
else
{
  $_SESSION['message']=" Sorry,Something went wrong";
  header("Location: postcom.php");
}
}

?>



