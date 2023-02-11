
<?php include('db.php') ?>

<?php
     include "includehome/header-home.php";
     include "includehome/home-navbar.php";
     
 ?>

 <head>
   <style>
    body{
      font-family: Palatino Linotype;
    }
     .error {
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background-color: hsla(227, 34%, 94%, 0.50);
        border-radius: 5px;
        text-align: left;
      }
    .success {
      color: #3c763d;
      border: 1px solid #3c763d;
      margin-bottom: 20px;
    }
   </style>
 </head>

<div style="background: #f44336;"><br>
<center>
 <h1>Contact Us</h1>
 <h4>(We present for your help)</h4>
</center><br>

<div class="row" style="background: #fff; margin-left: 30px; margin-right: 30px;">
<div class="col-lg-7 col-md-4 col-12"><br>

  <form method="POST" action="contactus.php">
    <?php include('errorscon.php'); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" name="username" value="<?php echo $email; ?>">
  </div>

  <div class="form-group">
    <label>Email:</label>
<?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          ?>

<?php echo "<input type=text name= email id= comment_id class=form-control value='".$row['email']."'>"; ?>
<label for="email" data-error="Invalid Email Format"></label>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile No.</label>
    <input type="number" class="form-control" id="Inputnumber" aria-describedby="numberHelp" placeholder="Enter Mobile No." name="MobileNo" maxlength="10" value="<?php echo $email; ?>">
  </div>

<div class="form-group">
    <label for="exampleInputMessage">Message</label>
    <textarea class="form-control" placeholder="Enter message" name="Message" value="<?php echo $email; ?>"></textarea>
  </div>

  <button type="submit" name="submit_ok" style="padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius: 5px; color: #fff;">Submit</button>
</form>
</div>
<div class="col-lg-1"></div>
<div class="col-lg-3 col-md-3 col-12"><br>
  
 <?php include "trandingblog.php"; ?>
 <?php include "socialmedia.php"; ?>
</div>

</div><br><br><br>
</div>

</div>
<?php 
  include "includehome/footer.php";
 ?>