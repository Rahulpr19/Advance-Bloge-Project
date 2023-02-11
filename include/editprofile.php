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
     include "includehome/header-home.php";
     include "includehome/home-navbar.php";
     
 ?>

<div class="container">
    <div style="width: 90%; margin: 0px auto;">
        <h1 class="text-center text-primary">Edit Profile</h1>
        <h4 class="text-center">(Welcome to your Profile page)</h4><br><br>

<!-----------display cover photo and navbar---------->
        <?php include "profilenav/nav.php" ?>

</div><br><br>

<!--------------Edit Profile------------------>

<?php 


$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'blog_cms');

 $q = "INSERT INTO users (MobileNo, city, education)
          VALUES('$MobileNo', '$city', '$education')";

              $query = mysqli_query($con, $q);

$display = "SELECT * FROM users ";
$queryfire = mysqli_query($con, $display);

  $num = mysqli_num_rows($queryfire);

  if(mysqli_num_rows($queryfire)>0)
  {
  $row=mysqli_fetch_assoc($queryfire)
 ?>



<div class="row">
<div class="col-lg-6">
        <form action="server" method="post">
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
          <div class="form-group">
              <label> Current City:</label>
              <?php echo "<input type=number name= city class=form-control value='".$row['city']."'>"; ?>
          </div>
          <div class="form-group">
              <label> Education:</label>
              <?php echo "<input type=number name= education class=form-control value='".$row['education']."'>"; ?>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" name="update">Save</button>
      </div>
    </form>
        </div>

<?php

}

?>


<div>
  
</div>


</div>
   <button type="button" class="btn2 btn-primary" data-dismiss="modal"><a href="profile.php">Back</a></button><br><br>


</div>
</div>
</div>
<?php 
  include "includehome/footer.php";
 ?>

