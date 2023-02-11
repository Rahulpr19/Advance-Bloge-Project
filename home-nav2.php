<div style="width: 98%; margin: 0px auto; ">
<!--------------------------User Name------------------------------>
<nav style="height: 50px;">
<div class="row p-3" style=" background: #f44336;">
  <div class="col-lg-8">
    <div class="userl">
      <font size="4" class="text-hover">
         Welcome 
        <?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select username from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          
          ?>
<!-----------show email------------------->
<span><a href="profile.php" class="text-white" style="text-decoration: none;"><?php echo $row['username']; ?>
<br><?php echo $_SESSION['email']; ?>
</a></span>
<br>
</font> 
</div>

  </div>

<!-----------Search Content------------->
  <div class="col-lg-4">
    <?php include "search.php"; ?>
  </div>
</nav>
<br>
</div>

