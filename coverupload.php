<?php
     include "includehome/header-home.php";
     include "includehome/home-navbar.php"; 
 ?>
 <?php include('server.php') ?>

 <head>
	<style>
		.btn{
			padding: 10px 20px;
			font-size: 15px;
			background-color:#000;
			border: none;
  			border-radius: 2px;
  			color: #fff;
		}
		.img{
			border: 1px solid #ddd;
			height: 200px;
			width: 360px;
			padding: 30px 90px;
		}


	</style>
</head>

<form action="coverupload.php" method="post" enctype="multipart/form-data">
<h2 class="text-primary text-center text-uppercase">Upload Cover Picture</h2><br>
  <div class="dropdown-divider"></div><br><br>
<div class="row">
<div class="col-lg-4">
</div>
<div class="col-lg-6">
<div class="img">
<div class="form-group">
	<input type="file" name="file">
</div><br>
<div class="form-group">
	<input type="submit" name="submit" class="btn text-white" value="Upload">
</div>
</div>
</div>
</div>
</form>

<?PHP
					$con = mysqli_connect('localhost','root');
					mysqli_select_db($con,'blog_cms');

					$email=$_SESSION['email'];

			          $sql="select * from users where email='$email'";
			         $res=mysqli_query($con,$sql);
					$row=mysqli_fetch_assoc($res);
			       $id=$row["id"];

					if (isset($_POST['submit'])) {
						
						$title = $_POST['title'];
						$files = $_FILES['file'];

						//print_r($title);
						//echo "<br>";
						//print_r($body);

						$filename = $files['name'];
						//print_r($filename);

						$fileerror = $files['error'];
						$filetmp = $files['tmp_name'];

						$fileext = explode('.', $filename);
						$filecheck = strtolower(end($fileext));

						$fileextstored = array('png', 'jpg', 'jpeg');

						if (in_array($filecheck, $fileextstored)) {
							$destinationfile = 'images/'. $filename;
							move_uploaded_file($filetmp, $destinationfile);


							$q = "INSERT INTO `uploadcoverphpto`(`title`, `cov_img` ,cov_id)
							VALUES ('$filename' , '$destinationfile' ,'$id')";

							$query = mysqli_query($con, $q);
							if($query)
							      {
							      $_SESSION['message']="<div class='bg'> Post is Published</div>";
							      header("Location: profile.php");
							      }
							      else
							      {
							        $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
							        header("Location: profile.php");
							      }

							}
							}

							?>


</div>
<?php 
  include "includehome/footer.php";
 ?>



