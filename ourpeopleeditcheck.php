<?php

session_start();

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');


if (isset($_POST['update'])) {

			$id=$_GET['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];


              $q = "update ourpeople set name='$name' , description='$description' where id=$id;";

              $query = mysqli_query($con, $q);
if($query)
{
$_SESSION['message']="<div class='bg'> Post is Updated</div>";
header("Location: ourpeople.php?id=".$id);
}
else
{
  $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
  header("Location: ourpeople.php?id=".$id);
}
}
              ?>