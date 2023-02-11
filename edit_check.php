<?php

session_start();

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');


if (isset($_POST['update'])) {

            $id=$_GET['id'];
            $head = $_POST['head'];
            $body = $_POST['body'];


              $q = "update upload set head='$head' , body='$body' where id=$id;";

              $query = mysqli_query($con, $q);
if($query)
{
$_SESSION['message']="<div class='bg'> Post is Updated</div>";
header("Location: edit.php?id=".$id);
}
else
{
  $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
  header("Location: edit.php?id=".$id);
}
}
              ?>