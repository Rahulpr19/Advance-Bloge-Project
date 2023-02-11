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
$con3 = mysqli_connect('localhost','root');
mysqli_select_db($con3,'blog_cms');

if(isset($_GET['id']))
{
 $id= $_GET['id'];
 $id=mysqli_real_escape_string($con3,$id);
$sql3="select * from comment where id=$id";
$res3=mysqli_query($con3,$sql3);
if(mysqli_num_rows($res3)>0)
{
  $row3=mysqli_fetch_assoc($res3);
?>


<?php include "comments/add2_comment.php"; ?>
<div class="card-panel" style="background: #f44336; border-radius: 10px;">
<div class="row p-3">
<div class="col-lg-9">
  <h3>Write Comment</h3>
<form action="editcommentcheck.php?id=<?php echo $id;?>" method="POST" id="comment_form"><br>
<div class="input-field">
  <label>Email:</label>
<?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          ?>

<?php echo "<input type=text name= email class=form-control value='".$row['email']. "'>" ?>
<label for="email" data-error="Invalid Email Format"></label>
</div><br>
<div class="input-field">  
<label>Comment:</label>

<textarea name="comment" id="comment_name" class="md-textarea form-control" rows="5" required="comment" placeholder="Your comment Goes Here..."><?php echo $row3['comment_text']; ?></textarea>
</div><br>
<div class="center">
<input type="hidden" name="comment_id" id="comment_id" value="0" />
<input type="submit" value="Update" name="update" style=" padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius:2px; color:#fff;"> 
</div>
</div><br>
</form>
</div>
</div>
</div>
<?php 
}
}
 ?>


<script type="text/javascript">
  function pop(){
  var x = document.getElementById('comment_id');
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
  }
</script>



</div>
<?php include "includehome/footer.php"; ?>


