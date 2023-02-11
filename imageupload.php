<?php 

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');
  $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $id=$row1["id"];

    $sql="select * from imgupload where user_id=$id order by id DESC limit 1";
    $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
    ?>

  
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: transparent;">
        <a class="nav-link dropdown-toggle" href="uploadimg.php" style="color: transparent;"><i class="fa fa-camera" style="color: #000; margin-right: 15%;"></i></a>
      </a>
        

 <a href="#" data-toggle="modal" data-target="#exampleModal">
		<img src="<?php echo $row['image']; ?>" class="img-fluid mb-2 rounded-circle" style="height: 150px; width: 140px; border: 3px solid #f44336;">
</a><br>

<!----------Image Viewer--------------->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <span class="modal-title" id="exampleModalLabel"><img src="<?php echo $row['image'];?>" alt="" style="max-width: 100%; box-shadow: black;"></span>
    </div>
  </div>
</div>

<!--------------End Img Viewer------------------>

    <span style="color: #000;">
      <?php echo $row1['username']; ?><br>
      <?php echo $row1['email']; ?>
    </span>

