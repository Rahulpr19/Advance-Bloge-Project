<?php

session_start();

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');

if(isset($_GET['id']))
{
 $id= $_GET['id'];
 $id=mysqli_real_escape_string($con,$id);

              $q = "DELETE FROM `upload` where id=$id;";

              $query = mysqli_query($con, $q);
if($query)
{
$_SESSION['message']="<div class='bg'> Post is daleted</div>";
header("Location: yourrecentpost.php");
}
else
{
  $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
  header("Location: yourrecentpost.php");
}
}

?>



