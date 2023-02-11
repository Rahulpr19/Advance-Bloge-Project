<?php
    include "includehome/header-home.php";
    include "includehome/home-navbar.php";
?>

<?php include('server.php') ?>
<head>
  <style>
    .bg{
      background-color: green !important;
      color: #fff !important;
      padding: 8px 17px;
      margin-bottom: 10px;
      width: 25%;
      border-radius: 30px;
      text-align: center;
    }
    .chip{
      background-color: red !important;
      color: #000 !important;
      padding: 8px 17px;
      width: 20%;
      border-radius: 30px;
    }
  </style>
</head>


<?php
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');

if(isset($_GET['id']))
{
 $id= $_GET['id'];
 $id=mysqli_real_escape_string($con,$id);
$sql="select * from ourpeople where id=$id";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
  $row=mysqli_fetch_assoc($res);
?>

<div class="container">

<form action="ourpeopleeditcheck.php?id=<?php echo $id;?>" method="POST">
  
<?php
if(isset($_SESSION['message']))
{
echo $_SESSION['message'];
unset($_SESSION['message']);
}
?>

<div class="form-group">
<label for="user"><span style="font-size: 150%; font-family: MS Office Symbol Extralight;">Edit Our People Details</span></label>
  
  <div class="form-group">
    <label>Name:</label>
      <?php echo "<input type=text name= name class=form-control value='".$row['name']."'>"; ?>
  </div>
</div><br><br>

<div class="form-group">
<label for="exampleInputEmail1">Description</label>
    <textarea name="description" class="md-textarea form-control" rows="5" placeholder="Your Description Goes Here...">
      <?php echo $row['description']; ?>
    </textarea>
</div>

<div class="center">
<input type="submit" value="Update" name="update" style=" padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius:2px; color:#fff;">
</div>
</form>


</div>    
<?php

  include "includehome/footer.php";
 ?>
<?php
}
else
{
  redirect("Location: home.php");
}
}

?>

