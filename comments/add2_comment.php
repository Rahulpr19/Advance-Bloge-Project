<?php

$error = '';
$email = '';
$comment = '';

if(empty($_POST["email"]))
{
 $error .= '<p class="text-danger">Name is required</p>';
}
else
{
 $email = $_POST["email"];
}
if(empty($_POST["comment"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment = $_POST["comment"];
}
if($error == '')
{
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$comment=$_POST['comment'];
$id1=$_GET['id'];
$email=mysqli_real_escape_string($con,$email);
$comment=mysqli_real_escape_string($con,$comment);
$id1=mysqli_real_escape_string($con,$id1);
$sql3="insert into comment (email,comment_text,post_id) values('$email','$comment',$id)";
$res3=mysqli_query($con,$sql3);
}
}
?>
