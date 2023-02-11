<?php
 	include "includehome/header-home.php";
    include "includehome/home-navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>writepost</title>
</head>
<body>
	<div class="container">
    <br>



<?PHP

					$con = mysqli_connect('localhost','root');
					mysqli_select_db($con,'blog_cms');

					if (isset($_POST['submit'])) {
						
						$title = $_POST['title'];
						$files = $_FILES['file'];
						$content = $_POST['content'];

						//print_r($title);
						//echo "<br>";
						//print_r($files);

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

							$q = "INSERT INTO `posts`(`title`, `image`, `content`) 
							VALUES ('$filename' , '$destinationfile' , '$content')";

							$query = mysqli_query($con, $q);


						}



					}


					?>

</div>
</body>
</html>
