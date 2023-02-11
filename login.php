<?php include('server.php') ?>

<?php
     include "include/header.php";
     include "include/navbar.php";
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  <link rel="stylesheet" type="text/css" href="css/stylelg.css">
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('image/gg.jpg');">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-center text-white">Login Page</h1>
        <h4 class="text-center text-white"><b>(Login To Continue)</b></h4><br><br><br>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-2"><?php include "sidebar.php"; ?></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
          <form method="post" action="login.php">
            <?php include('errors.php'); ?>
              <?php if (isset($_SESSION['success'])): ?>
                    <div class="error success">
                      <h3>
                        <?php 
                          echo $_SESSION['success'];
                          //unset($_SESSION['success']);
                         ?>
                      </h3>
                    </div>
                  <?php endif ?>
              <!-------------------Form page-------------------------------->
              <div class="form-group text-white">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
              </div>
              <div class="form-group text-white">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
              </div>
              <div class="form-group form-check text-white">
                <label class="form-check-label" for="exampleCheck1">Forgot Password ? &nbsp;<a href="forgotpass.php" class="btn text-white">Here</a></label>
              </div>
              <button type="submit" class="btn3" name="login_user">Login</button>
              <div class="form-group2">
                 <label class="form-check-label text-white" for="exampleCheck1">Not yet a member? <a href="register.php" style="text-decoration: none;"><span class="signup">Sign In</span></a></label>
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

