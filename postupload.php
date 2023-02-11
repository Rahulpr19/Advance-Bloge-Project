<?PHP
session_start();
					$con = mysqli_connect('localhost','root');
					mysqli_select_db($con,'blog_cms');

					$email=$_SESSION['email'];

          $sql="select * from users where email='$email'";
         $res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
       $id=$row["id"];
       $email=$row["email"];
       $username=$row["username"];

      $sql3="select * from imgupload where email='$email'";
    	$res3=mysqli_query($con,$sql3);
          $row3=mysqli_fetch_assoc($res3);
          $image=$row3["image"];

					if (isset($_POST['submit'])) {
						
						$posthead = $_POST['head'];
						$title = $_POST['title'];
						$files = $_FILES['file'];
						$body = $_POST['body'];

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


							$q = "INSERT INTO `upload`(`title`, `image`, `body` , `head` ,rec_id ,email , username ,pro_img)
							VALUES ('$filename' , '$destinationfile' ,'$body' , '$posthead' ,'$id' ,'$email' , '$username' ,'$destinationfile')";

							$query = mysqli_query($con, $q);
							if($query)
							      {
							      $_SESSION['message']="<div class='bg'> Post is Published</div>";
							      header("Location: write.php");
							      }
							      else
							      {
							        $_SESSION['message']="<div class='chip'> Sorry,Something went wrong.</div>";
							        header("Location: write.php");
							      }

							}
							}

							?>


