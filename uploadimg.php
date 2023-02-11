<?php include('server.php') ?>
<?php
	
    include "includehome/home-navbar.php"; 
 ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/stylehome.css">
   <link rel="stylesheet" type="text/css" href="css/stylefoot.css">
 <head>
	<style>
		body{
      font-family: Palatino Linotype;
    }
		.btn{
			padding: 10px 20px;
			font-size: 15px;
			background-color:#000;
			border: none;
  			border-radius: 2px;
  			color: #fff;
		}
	</style>
</head>

<div style="background: #f44336;"><br>
	<h3 class="text-black text-center text-uppercase">Upload Profile Picture</h3><br>
		<form action="uploadimg.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-7" style="background: #fff;"><br>
					<div class="form-group">
						<center><input type="file" name="file"></center>
					</div><br>
					<div class="form-group">
						<center><input type="submit" name="submit" class="btn text-white" value="Upload"></center>
					</div>
				</div>
			</div><br>
		</form>
</div>

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


							$q = "INSERT INTO `imgupload`(`title`, `image` ,user_id)
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



