<?php

session_start();

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');


if (isset($_POST['update'])) {

            $id=$_GET['id'];
            $comment = $_POST['comment'];


              $q = "update comment set comment_text='$comment' where id=$id;";

              $query = mysqli_query($con, $q);
if($query)
{
$_SESSION['message']="<div class='bg'> Post is Updated</div>";
header("Location: postcom.php?id=".$id);
}
else
{
  $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
  header("Location: postcom.php?id=".$id);
}
}
              ?>