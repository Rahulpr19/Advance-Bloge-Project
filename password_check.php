<?php
session_start();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blog_cms');

// REGISTER USER
if (isset($_POST['update'])) {
  $id=$_GET['id'];
  // receive all input values from the form
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

   
    $query = "update users set password='$password_1' where id=$id;";
    mysqli_query($db, $query);
   if($query)
{
$_SESSION['message']="<div class='bg'> Your Password is Changed Now.</div>";
header("Location: passwordsetting.php?id=".$id);
}
else
{
  $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
  header("Location: passwordsetting.php?id=".$id);
}
}
              ?>

