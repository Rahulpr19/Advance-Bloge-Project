<?php include('server.php') ?>

<?php
     include "include/header.php";
     include "include/navbar.php";
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>SignUp Page</title>
  <link rel="stylesheet" type="text/css" href="css/stylelg.css">
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('image/gg.jpg');">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-center text-white">Signin Page</h1>
        <h4 class="text-center text-white"><b>(signin To Continue)</b></h4><br><br><br>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-2"><?php include "sidebar.php"; ?></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
          <form method="post" action="register.php">
              <?php include('errors.php'); ?>
            <div class="form-group text-white">
              <label for="exampleInputuser">Username</label>
              <input type="text" class="form-control" id="exampleInputuser" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group text-white">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group text-white">
              <label for="exampleInputNumber">Mobile No:</label>
              <input type="Number" class="form-control" id="exampleInputNumber" aria-describedby="numberHelp" placeholder="Enter Mobile No." name="MobileNo" value="<?php echo $MobileNo; ?>">
            </div>
            <div class="form-group text-white">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_1">
            </div>
            <div class="form-group text-white">
              <label for="exampleInputPassword1">Confirm-Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_2">
            </div>
            <button type="submit" class="btn3" name="reg_user">Register</button>
            <div class="form-group2">
               <label class="form-check-label text-white" for="exampleCheck1">Already a member? <a href="login.php"><span class="signup">Sign in</span></a></label>
            </div>
          </form>
        </div>
      </div>
</body>
</html>


</div>
<?php 
  include "includehome/footer.php";
 ?>


