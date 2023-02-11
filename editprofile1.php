<?php
  include "includehome/header-home.php";
  include "includehome/home-navbar.php";
?>

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

<?php
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');

if(isset($_GET['id']))
{
 $id= $_GET['id'];
 $id=mysqli_real_escape_string($con,$id);
$sql="select * from users where id=$id";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
  $row=mysqli_fetch_assoc($res);
?>

<head>
  <style>
    .bg{
      background-color: green !important;
      color: #fff !important;
      padding: 8px 17px;
      margin-bottom: 10px;
      width: 35%;
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
    .top{
      margin-top: 60px;
    }
    .btn{
      padding: 10px 20px; 
      font-size: 15px; 
      background-color:#000; 
      border: none; 
      border-radius:2px; 
      color:#fff;
    }
    .center{
      margin-left: 30%;
    }
  </style>
</head>

<div class="container">
	<form action="editprofile_check.php?id=<?php echo $id;?>" method="POST">

          <?php
          if(isset($_SESSION['message']))
          {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          }
          ?>

            <div class="form-group">
                <label> Username:</label>
                <?php echo "<input type=text name= username class=form-control value='".$row['username']."'>"; ?>
            </div>

            <div class="form-group">
                <label> Email Id:</label>
                <?php echo "<input type=text name= email class=form-control value='".$row['email']."'>"; ?>
            </div>
            <div class="form-group">
              <label> Mobile:</label>
              <?php echo "<input type=number name= MobileNo class=form-control value='".$row['MobileNo']."'>"; ?>
          </div>

<!-----------------Add More Details Edit Part---------------------->
          <?php 

    $sql4="select * from add_details where your_id=$id order by id DESC limit 1";
    $res4=mysqli_query($con,$sql4);
          $row3=mysqli_fetch_assoc($res4);
    ?>
          <div class="form-group">
                <label> Location:</label>
                <?php echo "<input type=text name= location class=form-control value='".$row3['location']."'>"; ?>
            </div>
            <div class="form-group">
                <label> Pincode:</label>
                <?php echo "<input type=text name= pincode class=form-control value='".$row3['pincode']."'>"; ?>
            </div>
            <div class="form-group">
                <label> D.O.B:</label>
                <?php echo "<input type=text name= birth class=form-control value='".$row3['birth']."'>"; ?>
            </div>
            <div class="form-group">
                <label> Institute:</label>
                <?php echo "<input type=text name= institute class=form-control value='".$row3['institute']."'>"; ?>
            </div>
            <div class="form-group">
                <label> Bio:</label>
                <?php echo "<input type=text name= bio class=form-control value='".$row3['bio']."'>"; ?>
            </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="submit" value="Update" name="update" style=" padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius:5px; color:#fff;"> 
      </div>
    </form>

</div>


</div>
<?php

  include "includehome/footer.php";
 ?>


<?php
}
}

?>


