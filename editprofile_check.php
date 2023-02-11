<?php
session_start();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blog_cms');

// REGISTER USER
if (isset($_POST['update'])) {
  $id=$_GET['id'];
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $MobileNo = mysqli_real_escape_string($db, $_POST['MobileNo']);

//Add more details editing part//
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $birth = mysqli_real_escape_string($db, $_POST['birth']);
  $institute = mysqli_real_escape_string($db, $_POST['institute']);
  $bio = mysqli_real_escape_string($db, $_POST['bio']);
  


    $query = "update users set username='$username' ,email='$email', MobileNo='$MobileNo' where id=$id;";
    mysqli_query($db, $query);

//Add more Detils Editing Part//
    $query1 = "update add_details set location='$location' ,pincode='$pincode', birth='$birth', institute='$institute', bio='$bio' where your_id=$id;";
    mysqli_query($db, $query1);

   if($query)
{
$_SESSION['message']="<div class='bg'> Your dtailed is successfully Changed Now.</div>";
header("Location: profile.php?id=".$id);
}
else
{
  $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
  header("Location: profile.php?id=".$id);
}
}
              ?>


